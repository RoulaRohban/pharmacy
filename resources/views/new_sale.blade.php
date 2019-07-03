

<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Experiment | Vue.js Form</title>
  

  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css'>

</head>

<body>

<div class="container">
  <div id="app">
    <vue-form v-model="form" inline-template>
      <form @submit.prevent="submit()">
        <app-order :value="model" @input="value => {update(value)}" inline-template>
          <div>
          
            <h2>Sale_order</h2>
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group">
                  <label :for="model['children.address.children.street.id']">Name</label>
                  <input :id="model['children.address.children.street.id']" type="text" class="form-control" v-model="model['children.address.children.street.value']" @input="update(model)">
                </div>
              </div>  
             <div class="form-group">
                  <label :for="model['children.address.children.city.id']">Gender</label>
                  <city-picker v-model="model['children.address.children.city']" @input="update(model)"  inline-template> 
                    <select :id="model.id" class="form-control" :value="model.value" @input="update($event.target.value)">
                      <option value="">Male</option>
                      <option value="denver">Female</option>
                     
                    </select>
                  </city-picker>
                </div>
              <div class="col-lg-2">
                <div class="form-group">
                  <label :for="model['children.address.children.state.id']">Adress</label>
                  <input :id="model['children.address.children.state.id']" type="text" class="form-control" v-model="model['children.address.children.state.value']" @input="update(model)">
                </div>
              </div>
              <div class="col-lg-3">
                <div class="form-group">
                  <label :for="model['children.address.children.zip.id']">Phone</label>
                  <input :id="model['children.address.children.zip.id']" type="text" class="form-control" v-model="model['children.address.children.zip.value']" @input="update(model)">
                </div>
              </div>
            </div>
            <h2>Items</h2>
            <collection :prototype="{children:{name: {}, quantity: {}, price: {}, total: {}, overrideTotal: {}}}" v-model="model['children.items']" @input="update(model)" inline-template>
              <!-- In <collection/> scope now -->
              <div class="form-group">
                <ul class="pl-0">
                  <li class="card mb-2" v-for="(item, key) in model.children">
                    <!-- This is equivalent to the prototype template -->
                    <app-order-item v-model="model.children[key]" :options="options" @input="update(model)" class="p-3" inline-template>
                      <div>
                        <div class="row">
                          <div class="col-md-9 col-lg-5">
                            <div class="form-group">
                              <form action='/sale_order' method='POST'>
                                @csrf
                  <label :for="model['children.address.children.city.id']">Drugs</label>
                  <city-picker v-model="model['children.address.children.city']" @input="update(model)"  inline-template> 
                    <select :id="drug_id" class="form-control" :value="model.value" @input="update($event.target.value)">
                      @foreach($drugs as $drug)
                         <option>{{ $drug->title }}</option>
                      @endforeach
                    </select>
                  </city-picker>
                </div>
                          </div>
                          <div class="col-md-3 col-lg-2">
                            <div class="form-group">
                              <label :for="amount">Qty</label>
                              <input :id="model['children.quantity.id']" type="number" class="form-control" v-model="model['children.quantity.value']" @input="update(model)" min="0"/>
                            </div>
                          </div>
                        </div>
                
                      </div>
                    </app-order-item>
                    <div class="btn-group card-footer">
                      <button @click="addItem(item, key + 1)" class="btn btn-primary" type="button"><i class="fa fa-copy fa-fw"></i> Copy Item</button> <button @click="removeItem(key)" class="btn btn-danger" type="button"><i class="fa fa-minus fa-fw"></i> Remove Item</button>
                    </div>
                  </li>
                </ul>
                <button @click="addItem()" class="btn btn-primary" type="button"><i class="fa fa-plus fa-fw"></i>Add Item</button>
              </div>
            </collection>
            <hr/> <div class="col-md-6 col-lg-3">
                            <div class="form-group">
                              <label :for="model['children.total.id']">Total</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">sp</span>
                                </div>
                                <input :id="model['children.total.id']" type="number" class="form-control" :readonly="!model['children.overrideTotal.value']" v-model="model['children.total.value']" @input="update(model)"/>
                                <div class="input-group-append">
                                  <span class="input-group-text"><label class="mb-0"><input type="checkbox" v-model="model['children.overrideTotal.value']" @change="update(model)"/> Set</label></span>
                                </div>
                              </div>
                            </div>
                          </div>
                                
            <button type='submit'>Submit</button>
          </div>
        </app-order>
      </form>
    </vue-form>
    
  </div>
</div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.13/vue.js'></script>
<script src='https://cdn.jsdelivr.net/npm/vue-deepset@0.6.3/vue-deepset.min.js'></script>

  

    <script  src="js3/index.js"></script>




</body>

</html>


