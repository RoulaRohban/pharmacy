@extends('layout')

@section('title')
  <h1 class='title appTitle'>Category Editing «{{ $category->title }}»</h1>
@endsection

@section('content')
  <div class='box appForm-container'>
    <form action='/categories/{{ $category->id }}' method='POST'>
      @method('PATCH')
      @csrf
      <div class='field'>
        <label for='title' class='label'>Name</label>
        <div class='control'>
          <input class="input" type='text' id='title' name='title' required
                 value='{{ $category->title }}'
                 placeholder='Enter category name'>
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
                    placeholder='Enter a description of the category.'
                    rows='10'>{{ $category->description }}</textarea>
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

    @if($category->drugs->count() == 0)
      <div class='appForm-delete'>
        <form action='/categories/{{ $category->id }}' method='POST'>
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
