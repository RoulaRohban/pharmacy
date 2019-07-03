@extends('layout')

@section('title')
  <h1 class='title appTitle'>Editing the drug record «{{ $drug->title }}»</h1>
@endsection

@section('content')
  <div class='box appForm-container'>
    <form action='/drugs/{{ $drug->id }}' method='POST'>
      @method('PATCH')
      @csrf
      <div class='field'>
        <label for='title' class='label'>Name</label>
        <div class='control'>
          <input class="input" type='text' id='title' name='title' required
                 placeholder='Enter the name of the drug'
                 value='{{ $drug->title }}'>
        </div>
      </div>

      <div class='field'>
        <label for='provider_id' class='label'>Provider</label>
        <div class='control'>
          <div class="select is-fullwidth">
            <select id='provider_id' name='provider_id' class='is-fullwidth'>
              @foreach($providers as $provider)
                <option value='{{ $provider->id }}'
                  {{ $provider->id == $drug->provider_id ? 'selected' : '' }}>
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
                <option value='{{ $category->id }}'
                  {{ $category->id == $drug->category_id ? 'selected' : '' }}>
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
                 placeholder='Enter the unit'
                 value='{{ $drug->measure }}'>
          <p class='help'>For example, 12 tablets of 50mg</p>
        </div>
      </div>

      <div class='field'>
        <label for='price' class='label'>Drug price</label>
        <div class='field has-addons'>
          <div class='control is-expanded'>
            <input class="input" type='number' id='price' name='price' required
                   min='1' max='9999' step='1'
                   placeholder='Enter the price of the drug'
                   value='{{ number_format($drug->price, 2, '.', '') }}'>
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
                   min='1' max='9999' step='1'
                   placeholder='Enter the Orginal price of the drug'
                   value='{{ number_format($drug->OrginalPrice, 2, '.', '') }}'>
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
                   min='1' max='9999' step='1'
                   placeholder='Enter the QTY of the drug'
                   value='{{ $drug->balance }}'>
          </div>
           </div>
             </div>

     <div class='field'> 
     <label for='limitQTY' class='label'>Drug limit of QTY</label>
        <div class='field has-addons'>
          <div class='control is-expanded'>
            <input class="input" type='number' id='limitQTY' name='limitQTY' required
                   min='0' max='100' step='1'
                   placeholder='Enter limit of QTY drug'
                   value='{{ $drug->limitQTY }}'>
          </div>
           </div>
             </div>

          <div class='field'>
             <label for='ExpiredDate' class='label'>Drug Expired Date</label>
              <div class='field has-addons'>
                <div class='control is-expanded'>
            <input class="input" type="date" id="ExpiredDate" name='ExpiredDate'
            placeholder='choose Expired Date of the drug'
            value='{{ $drug->ExpiredDate }}'>
             </div>
              </div>
              </div>

      <div class='columns appForm-actions'>
        <div class='column is-narrow'>
          <button style="background-color: #34699A" class='button is-success' type='submit'>
              <span style="background-color: #34699A" class="icon is-small">
                <i style="background-color: #34699A" class="fas fa-edit"></i>
              </span>
            <span style="background-color: #34699A">Save changes</span>
          </button>
        </div>

        <div class='column is-narrow'>
          <button class='button' onclick='window.history.back()'>
            Cancel
          </button>
        </div>
      </div>
    </form>

    <div class='appForm-delete'>
      <form action='/drugs/{{ $drug->id }}' method='POST'>
        @method('DELETE')
        @csrf
        <button class='button is-danger' type='submit'>
              <span class="icon is-small">
                <i class="fas fa-trash-alt"></i>
              </span>
          <span>Delete record</span>
        </button>
      </form>
    </div>
  </div>
@endsection
