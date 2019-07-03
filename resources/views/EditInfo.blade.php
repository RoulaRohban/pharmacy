@extends('welcomm')

@section('title')
  <h1 class='title appTitle'>Editing Your Information</h1>
@endsection

@section('content')
  <div class='box appForm-container'>
    <form method='PUT'>
      <div class='field'>
        <label class='label'>Name</label>
        <div class='control'>
          <input class="input" type='text'>
        </div>
      </div>
      <div class='field'>
        <label class='label'>Email</label>
        <div class='control'>
          <input class="input" type='text'>
        </div>
      </div>
      <div class='field'>
        <label class='label'>Password</label>
        <div class='control'>
          <input class="input" type='text'>
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

  
  </div>
@endsection
