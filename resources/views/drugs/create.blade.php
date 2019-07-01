@extends('layout')

@section('title')
  <h1 class='title appTitle'>Adding a new drug</h1>
@endsection

@section('content')
  <div class='box appForm-container'>
    <form action='/drugs' method='POST'>
      @csrf
      <div class='field'>
        <label for='title' class='label'>Name</label>
        <div class='control'>
          <input class="input" type='text' id='title' name='title' required
                 placeholder='Enter the name of the drug'>
        </div>
      </div>

      <div class='field'>
        <label for='provider_id' class='label'>Provider</label>
        <div class='control'>
          <div class="select is-fullwidth">
            <select id='provider_id' name='provider_id' class='is-fullwidth'>
              @foreach($providers as $provider)
                <option value='{{ $provider->id }}'>
                  {{ $provider->title }}
                </option>
              @endforeach
            </select>
          </div>
        </div>
      </div>

      <div class='field'>
        <label for='category_id' class='label'>Category</label>
        <div class='control'>
          <div class="select is-fullwidth">
            <select id='category_id' name='category_id' class='is-fullwidth'>
              @foreach($categories as $category)
                <option value='{{ $category->id }}'>
                  {{ $category->title }}
                </option>
              @endforeach
            </select>
          </div>
        </div>
      </div>

      <div class='field'>
        <label for='measure' class='label'>Unit of Measurement / Packing</label>
        <div class='control'>
          <input class="input" type='text' id='measure' name='measure' required
                 placeholder='Enter the unit'>
          <p class='help'>For example, 12 tablets of 50mg</p>
        </div>
      </div>

      <div class='field'>
        <label for='price' class='label'>Drug price</label>
        <div class='field has-addons'>
          <div class='control is-expanded'>
            <input class="input" type='number' id='price' name='price' required
                   min='1' max='99999' step='1'
                   placeholder='Enter the price of the drug'>
          </div>
          <p class="control">
            <a class="button is-static">
             SP
            </a>
          </p>
        </div>
      </div>
      <div class='field'>
        <label for='OrginalPrice' class='label'>Drug Orginal Price</label>
        <div class='field has-addons'>
          <div class='control is-expanded'>
            <input class="input" type='number' id='OrginalPrice' name='OrginalPrice' required
                   min='1' max='99999' step='1'
                   placeholder='Enter the Orginal Price of the drug'>
          </div>
          <p class="control">
            <a class="button is-static">
             SP
            </a>
          </p>
        </div>
      </div>
            <div class='field'>
             <label for='balance' class='label'>Drug QTY</label>
              <div class='field has-addons'>
          <div class='control is-expanded'>
            <input class="input" type='number' id='balance' name='balance' required
                   min='1' max='99999' step='1'
                   placeholder='Enter the QTY of the drug'>
          </div>
          </div>
              </div>

              <div class='field'>
             <label for='limitQTY' class='label'>Drug Limit Of QTY</label>
              <div class='field has-addons'>
          <div class='control is-expanded'>
            <input class="input" type='number' id='limitQTY' name='limitQTY' required
                   min='0' max='100' step='1'
                   placeholder='Enter Limit of QTY drug'>
          </div>
          </div>
              </div>

              <div class='field'>
             <label for='ExpiredDate' class='label'>Drug Expired Date</label>
              <div class='field has-addons'>
                <div class='control is-expanded'>
            <input class="input" type="date" id="ExpiredDate" name='ExpiredDate'
            placeholder='choose Expired Date of the drug'>
             </div>
              </div>
              </div>

      <div class='columns appForm-actions'>
        <div class='column is-narrow'>
          <button style="background-color: #34699A" class='button is-success' type='submit'>
              <span class="icon is-small">
                <i class="fas fa-plus"></i>
              </span>
            <span style="background-color: #34699A">Add a Purchase order</span>
          </button>
        </div>

        <div class='column is-narrow'>
          <button class='button' onclick='window.history.back()' >
            Cancel
          </button>
        </div>

      </div>
    </form>
  </div>
@endsection
