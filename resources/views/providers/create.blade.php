@extends('layout')

@section('title')
  <h1 class='title appTitle'>Adding a new supplier</h1>
@endsection

@section('content')
  <div class='box appForm-container'>
    <form action='/providers' method='POST'>
      @csrf
      <div class='field'>
        <label for='title' class='label'>Name</label>
        <div class='control'>
          <input class="input" type='text' id='title' name='title' required
                 placeholder='Enter supplier name'>
        </div>
      </div>

      <div class='field'>
        <label for='city' class='label'>City</label>
        <div class='control'>
          <input class="input" type='text' id='city' name='city' required
                 placeholder='Enter city'>
        </div>
      </div>

      <div class='field'>
        <label for='address' class='label'>Address</label>
        <div class='control'>
          <input class="input" type='text' id='address' name='address' required
                 placeholder='Enter Adress'>
          <p class='help'>For example: damas street 37</p>
        </div>
      </div>

      <div class='field'>
        <label for='manager' class='label'>Manager Name</label>
        <div class='control'>
          <input class="input" type='text' id='manager' name='manager' required
                 placeholder='Enter your name'>
        </div>
      </div>

      <div class='field'>
        <label for='phone' class='label'>Phone</label>
        <div class='control'>
          <input class="input" type='tel' id='phone' name='phone' required
                 placeholder='Enter the phone'>
        </div>
      </div>

      <div class='columns appForm-actions'>
        <div class='column is-narrow'>
          <button class='button is-success' type='submit'>
              <span class="icon is-small">
                <i class="fas fa-plus"></i>
              </span>
            <span>Add Supplier</span>
          </button>
        </div>

        <div class='column is-narrow'>
          <button class='button' onclick='window.history.back()'>
            Cancel
          </button>
        </div>
      </div>
    </form>
  </div>
@endsection
