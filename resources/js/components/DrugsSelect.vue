<template>
  <div>
    <label class='label'>{{ selectedDrugs.length > 1 ? 'Препараты' : 'Препарат'}}</label>
    <div class='columns' v-for='(drugSelector, index) in selectedDrugs'>
      <div class='column is-expanded'>
        <div class='field has-addons'>
          <div class='control is-expanded'>
            <div class="select is-fullwidth">
              <select name='drg' required class='is-fullwidth' v-model='drugSelector.drug_id'
                      @input='handleSelectInput(Number($event.currentTarget.value))'>
                <option v-for='drug in drugs' :value='drug.id' :disabled='selectedDrugs.some(sd => sd.drug_id === drug.id)'>
                  {{ drug.title }}
                </option>
              </select>
            </div>
          </div>
          <p class="control">
            <input class="input" type='number' name='amount[]' required
                   ref='amountInput'
                   min='1' :max='drugs.find(d => d.id === drugSelector.drug_id).balance'
                   @input='handleAmountInput($event, drugs.find(d => d.id === drugSelector.drug_id).balance)'
                   step='1' value='1'
                   placeholder='Кол-во'>
          </p>
        </div>
      </div>
      <div class='column is-narrow'>
        <button type='button'
                class='button is-danger'
                @click='unselectDrug(drugSelector.drug_id)'
                :class="{'hidden': index === 0}">
          <span class="icon is-small">
            <i class="fas fa-trash-alt"></i>
          </span>
        </button>
      </div>
    </div>
    <button type='button' class='button' @click='addNewSelector()'>+</button>
    <div class='columns appForm-actions'>
      <div class='column is-narrow'>
        <button class='button is-success' type='button' @click='postData()'>
              <span class="icon is-small">
                <i class="fas fa-check"></i>
              </span>
          <span>Оформить продажу</span>
        </button>
      </div>

      <div class='column is-narrow'>
        <button class='button' type='button' onclick='window.history.back()'>
          Отменить
        </button>
      </div>
    </div>
  </div>
</template>

<script>
  function createHiddenField(name, value) {
    let input = document.createElement('input');
    input.setAttribute('type', 'hidden');
    input.setAttribute('name', name);
    input.setAttribute('value', value);
    return input;
  }

  export default {
    name: 'DrugsSelect',
    props: ['drugs'],
    data() {
      return {
        selectedDrugs: [],
      }
    },
    mounted() {
      this.selectedDrugs.push({ drug_id: this.drugs[0].id })
    },
    methods: {
      postData() {
        const form = document.querySelector('#create-sale-form');
        this.selectedDrugs.forEach(sd => {
          form.appendChild(createHiddenField('drug_id[]', sd.drug_id))
        });
        form.submit();
      },
      addNewSelector() {
        if (this.selectedDrugs.length === this.drugs.length) return
        const availableId = this.drugs.find(d => !this.selectedDrugs.some(sd => sd.drug_id === d.id)).id;
        this.selectedDrugs.push({ drug_id: availableId});
      },
      unselectDrug(id) {
        this.selectedDrugs.splice(this.selectedDrugs.findIndex(sd => sd.drug_id === id), 1)
      },
      handleAmountInput(ev, max) {
        if (ev.currentTarget.value > max) ev.currentTarget.value = max;
        if (ev.currentTarget.value < 1) ev.currentTarget.value = 1;
      },
      findDrugById(id) {
        return this.drugs.find(d => d.id === id);
      },
      handleSelectInput(drug_id) {
        if (this.$refs.amountInput[0].value > this.findDrugById(drug_id).balance) this.$refs.amountInput[0].value = this.findDrugById(drug_id).balance
      }
    }
  }
</script>

<style>
  .hidden {
    visibility: hidden;
    opacity: 0;
  }
</style>
