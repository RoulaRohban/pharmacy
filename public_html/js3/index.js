/**
 * Made to serve as a model for integrating Vue with Symfony's
 * form system.
 */

Vue.use(VueDeepSet);

// Pretending this a function to get from an api

var getCityPricing = function(cityName) {
  return staticCityPricing[cityName];
};

var staticCityPricing = {
  denver: {
    discount: 0
  },
  englewood: {
    discount: 10
  },
  pueblo: {
    discount: 5
  }
};

// Helper for common form functions

var formMixin = {
  methods: {
    iterate: function (formModel, fn, carry, key) {
      // Carry is passed from parent to child, but not siblings
            
      carry = fn(formModel, key, carry);
            
      for (var key in formModel.children) {
        var subFormModel = formModel.children[key];
        
        this.iterate(subFormModel, fn, carry, key); 
      }
    }
  }
}

/**
 * Replaces a traditional form with one that takes a rich
 * nested model representing all the subforms in the form
 * and their values and state. It submits synchronously like
 * a normal form. When it is serializing its model, it will
 * iterate over the "children" key of each node and use the
 * "value" key of leaf nodes for the actual value to submit.
 */
Vue.component('vue-form', {
  template: `<form @submit.prevent="submit()"><slot></slot></form>`,
  mixins: [formMixin],
  props: {
    value: {
      type: Object,
      default: function() {
        return {}
      }
    },
    options: {
      default: function() {
        return {}
      }
    }
  },
  computed: {
    model: {
      get: function() {
        return this.$deepModel(JSON.parse(JSON.stringify(this.value)));
      },
      set: function(newForm) {
        this.$emit('input', newForm);  
      }
    }
  },
  created: function() {
    this.setIds(this.model);
  },
  methods: {
    update: function(newModel) {
      this.setIds(newModel);
      
      this.model = newModel;
    },
    setIds: function(formModel) {
      this.iterate(formModel, function (formModel, formKey, prefix) {
          var id = (('undefined' !== typeof prefix) ? prefix + '_' : '') + ('undefined' !== typeof formKey ? formKey : 'form');
        
          formModel.id = id;
        
          return id;
      });
    },
    getSerializedList: function(formModel, prefix) {
      var list = {};
      
      this.iterate(formModel, function (formModel, formKey, prefix) {
        var name = prefix ? prefix + '[' + formKey + ']' : formKey;
        
        if ('undefined' !== typeof formModel.value) {
          list[name] = formModel.value;
        }
        
        return name;
      });
      
      return list;
    },
    submit: function() {
      // Create a new form with data mapped to inputs and submit that
      // like a normal form.

      var serialized = this.getSerializedList(this.value);

      var form = document.createElement('form');

      form.action = this.$el.action;
      form.method = this.$el.method;

      if (-1 === ['GET', 'POST'].indexOf(this.$el.method.toUpperCase())) {
        flatList._method = this.$el.method.toUpperCase();
        form.method = 'POST';
      }

      for (var name in serialized) {
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = name;
        input.value = serialized[name];
        form.append(input);
      }

      document.querySelector('body').append(form);

      form.submit();
    }
  }
});

Vue.component('collection', {
  props: {
    prototype: {
      type: Object,
      default: function() {
        return {}
      }
    },
    value: {
      type: Object,
      default: function() {
        return {};
      }
    },
    options: {
      default: function() {
        return {}
      }
    }
  },
  computed: {
    model: {
      get: function() {
        var model = JSON.parse(JSON.stringify(this.value));
        
        if (!model) {
          model = {};
        }
        
        model.children = (model.children || []).map(function(child) {
          return this.$deepModel(child);
        }.bind(this));
        
        return this.$deepModel(model);
      },
      set: function(newModel) {
        this.$emit('input', newModel);
      }
    }
  },
  methods: {
    update: function(newModel) {
      this.model = newModel;
    },
    removeItem: function(index) {
      var newModel = this.model;
      
      newModel.children = newModel.children.slice(0, index).concat(newModel.children.slice(index + 1));

      this.model = newModel;
    },
    addItem: function(item, index) {
      if ('undefined' === typeof item) {
        item = this.prototype;
      }

      if ('undefined' === typeof index) {
        index = this.model.children.length;
      }

      var newModel = this.model;
      var newItem = JSON.parse(JSON.stringify(item));

      newModel.children.splice(index, 0, newItem);
      
      console.log(newModel);

      this.model = newModel;
    }
  }
});

Vue.component('app-order', {
  props: {
    value: {
      type: Object,
      default: function() {
        return {}
      }
    },
    options: {
      default: function() {
        return {}
      }
    }
  },
  computed: {
    model: {
      get: function() {
        return this.$deepModel(JSON.parse(JSON.stringify(this.value)));
      },
      set: function(newModel) {
        this.$emit('input', newModel);  
      }
    },
    validItems: function() {
      return this.getValidItems();
    }
  },
  methods: {
    getValidItems: function() {
      return (this.model['children.items.children'] || []).filter(function(item) {
        return item.children.quantity.value && item.children.name.value;
      });
    },
    getItemTotal: function() {
      return this.getValidItems().reduce(function(sumTotal, item) {
        return sumTotal + +(item.children.total.value || 0);
      }, 0);
    },
    update: function(newModel) {
      // You can further modify the model and emit it, or
      // reject it by emitting the value prop instead.
      // Do not use computed properties here though, they might
      // be out of date!

      newModel['children.total.value'] = this.getItemTotal();
      
      this.model = newModel;
    }
  }
});

Vue.component('app-order-item', {
  props: {
    value: {
      type: Object,
      default: function() {
        return {}
      }
    },
    options: {
      default: function() {
        return {}
      }
    }
  },
  computed: {
    model: {
      get: function() {
        return this.$deepModel(JSON.parse(JSON.stringify(this.value)));
      },
      set: function(newModel) {
        this.$emit('input', newModel);   
      }
    }
  },
  methods: {
    getTotal: function() {
      var total = 0;

      if (this.model['children.price.value'] && this.model['children.quantity.value']) {
        total += this.model['children.price.value'] * this.model['children.quantity.value'];
      }

      total += (this.model['children.addons.children'] || []).reduce(function(sumTotal, addon) {
        return sumTotal + +(addon.children.price.value || 0);
      }, 0);

      return (Math.round(100 * total) / 100).toFixed(2);
    },
    update: function(newModel) {
      if (!this.model['children.overrideTotal.value']) {
        this.model['children.total.value'] = this.getTotal();
      }
      

      this.model = newModel;
    }
  }
})

/**
 * Simple picker component meant to simulate an entity dropdown which
 * gets the full entity and not just an id.
 */
Vue.component('city-picker', {
  props: {
    value: {
      type: Object,
      default: function() {
        return {}
      }
    },
    options: {
      default: function() {
        return {}
      }
    }
  },
  computed: {
    model: {
      get: function() {
        return this.$deepModel(JSON.parse(JSON.stringify(this.value)));
      },
      set: function(newModel) {
        this.$emit('input', newModel);   
      }
    }
  },
  created: function() {
     this.update(this.value.value);
  },
  methods: {
    update: function(id) {
      var cityPricing = getCityPricing(id);
      
      this.model = {
        value: id,
        pricing: cityPricing
      };
    }
  }
})

var testv = new Vue({
  el: '#app',
  data: {
    form: {
      children: {
        name: {
          value: null
        },
        address: {
          children: {
            street: {
              value: '1234 Main St'
            },
            city: {
              value: 'denver'
            },
            state: {
              value: ''
            },
            zip: {
              value: ''
            }
          },
        },
        items: {
          children: []
        }
      }
    }
  },
  methods: {
    handleIt: function() {
      alert('Handled');
    }
  }
})