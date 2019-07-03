@extends('layout')

@section('title')
  <h1 class='title appTitle'>Drug information «{{ $drug->title }}»</h1>
@endsection

@section('content')
  <div class='box appForm-container'>
    <div class='field'>
      <p class='label'>Name of product</p>
      <p>{{ $drug->title }}</p>
    </div>

    <div class='field'>
      <p class='label'>Provider</p>
      <p>
        <a href="/providers/{{ $drug->provider->id }}">
          {{ $drug->provider->title }}
        </a>
      </p>
    </div>

    <div class='field'>
      <p class='label'>Category</p>
      <p>
        <a href="/categories/{{ $drug->category->id }}">
          {{ $drug->category->title }}
        </a>
      </p>
    </div>

    <div class='field'>
      <p class='label'>Unit of Measurement / Packing</p>
      <p>{{ $drug->measure }}</p>
    </div>

    <div class='field'>
      <p class='label'>Qty in stock</p>
      <p>{{ $drug->balance }}</p>
    </div>

    <div class='field'>
      <p class='label'>Price</p>
      <p>{{ number_format($drug->price, 2, '.', ' ') }} SP</p>
    </div>

    <div class='field'>
      <p class='label'>Orginal Price</p>
      <p>{{ number_format($drug->OrginalPrice, 2, '.', ' ') }} SP</p>
    </div>

    <div class='field'>
      <p class='label'>Expired Date</p>
      <p>{{ $drug->ExpiredDate }}</p>
    </div>

    <div class='columns appForm-actions'>
      <div class='column is-narrow'>
        <a href='/drugs/{{ $drug->id }}/edit'
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
    </form>
  </div>
@endsection
