@extends('layout')

@section('title')
  <h1 class='title appTitle'>Editing a supplier record «{{ $provider->title }}»</h1>
@endsection

@section('content')
  <div class='box appForm-container'>
    <form action='/providers/{{ $provider->id }}' method='POST'>
      @method('PATCH')
      @csrf
      <div class='field'>
        <label for='title' class='label'>Name</label>
        <div class='control'>
          <input class="input" type='text' id='title' name='title' required
                 value='{{ $provider->title }}'
                 placeholder='Enter supplier name'>
        </div>
      </div>

      <div class='field'>
        <label for='city' class='label'>City</label>
        <div class='control'>
          <input class="input" type='text' id='city' name='city' required
                 value='{{ $provider->city }}'
                 placeholder='Enter city'>
        </div>
      </div>

      <div class='field'>
        <label for='address' class='label'>Address</label>
        <div class='control'>
          <input class="input" type='text' id='address' name='address' required
                 value='{{ $provider->address }}'
                 placeholder='Введите адрес'>
          <p class='help'>for Example: Damas Street 30</p>
        </div>
      </div>

      <div class='field'>
        <label for='manager' class='label'>Representative Name</label>
        <div class='control'>
          <input class="input" type='text' id='manager' name='manager' required
                 value='{{ $provider->manager }}'
                 placeholder='Enter Name'>
        </div>
      </div>

      <div class='field'>
        <label for='phone' class='label'>Phone</label>
        <div class='control'>
          <input class="input" type='tel' id='phone' name='phone' required
                 value='{{ $provider->phone }}'
                 placeholder='Enter the phone'>
        </div>
      </div>

      <div class='columns appForm-actions'>
        <div class='column is-narrow'>
          <button class='button is-success' type='submit'>
              <span class="icon is-small">
                <i class="fas fa-edit"></i>
              </span>
            <span>Save changes</span>
          </button>
        </div>

        <div class='column is-narrow'>
          <button class='button' onclick='window.history.back()'>
            Cancel
          </button>
        </div>
      </div>
    </form>

    @if($provider->drugs->count() == 0)
      <div class='appForm-delete'>
        <form action='/providers/{{ $provider->id }}' method='POST'>
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
    @endif
  </div>
@endsection
