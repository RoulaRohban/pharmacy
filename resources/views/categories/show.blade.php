@extends('layout')

@section('title')
  <h1 class='title appTitle'>Category Information «{{ $category->title }}»</h1>
@endsection

@section('content')
  <div class='box appForm-container'>
    <div class='field'>
      <p class='label'>Category Name</p>
      <p>{{ $category->title }}</p>
    </div>

    <div class='field'>
      <p class='label'>Description</p>
      <p>{{ $category->description }}</p>
    </div>


    @if($category->drugs->count() > 0)
      <div class='field'>
        <p class='label'>List of products in this category</p>
        <ul>
          @foreach($category->drugs as $drug)
            <li>
              <a href="/drugs/{{ $drug->id }}">
                {{ $drug->title }}
              </a>
            </li>
          @endforeach
        </ul>
      </div>
    @endif

    <div class='columns appForm-actions'>
      <div class='column is-narrow'>
        <a href='/categories/{{ $category->id }}/edit'
           class='button is-info'>
              <span class="icon is-small">
                <i class="fas fa-edit"></i>
              </span>
          <span>Change record</span>
        </a>
      </div>

      <div class='column is-narrow'>
        <button class='button' onclick='window.history.back()'>Back</button>
      </div>
    </div>
  </div>
@endsection
