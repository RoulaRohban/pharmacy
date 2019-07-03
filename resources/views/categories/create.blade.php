@extends('layout')

@section('title')
  <h1 class='title appTitle'>Adding a new category</h1>
@endsection

@section('content')
  <div class='box appForm-container'>
    <form action='/categories' method='POST'>
      @csrf
      <div class='field'>
        <label for='title' class='label'>Name</label>
        <div class='control'>
          <input class="input" type='text' id='title' name='title' required
                 placeholder='Enter Name'>
        </div>
      </div>

      <div class='field'>
        <label for='description' class='label'>Description</label>
        <div class='control'>
          <textarea class='textarea'
                    name='description'
                    id='description'
                    cols='30'
                    required
                    placeholder='Enter Description'
                    rows='10'></textarea>
        </div>
      </div>

      <div class='columns appForm-actions'>
        <div class='column is-narrow'>
          <button class='button is-success' type='submit'>
              <span class="icon is-small">
                <i class="fas fa-plus"></i>
              </span>
            <span>Add a category</span>
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
