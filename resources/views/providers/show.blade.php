@extends('layout')

@section('title')
  <h1 class='title appTitle'>Supplier Information «{{ $provider->title }}»</h1>
@endsection

@section('content')
  <div class='box appForm-container'>
    <div class='field'>
      <p class='label'>Supplier name</p>
      <p>{{ $provider->title }}</p>
    </div>

    <div class='field'>
      <p class='label'>City</p>
      <p>{{ $provider->city }}</p>
    </div>

    <div class='field'>
      <p class='label'>Adress</p>
      <p>{{ $provider->address }}</p>
    </div>

    <div class='field'>
      <p class='label'>Representative Name</p>
      <p>{{ $provider->manager }}</p>
    </div>

    <div class='field'>
      <p class='label'>Phone</p>
      <p>
        <a href="tel:{{ $provider->phone }}">
          {{ $provider->phone }}
        </a>
      </p>
    </div>
    @if($provider->drugs->count() > 0)
      <div class='field'>
        <p class='label'>List of goods supplied</p>
        <ul>
          @foreach($provider->drugs as $drug)
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
        <a href='/providers/{{ $provider->id }}/edit'
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
