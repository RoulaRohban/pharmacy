@extends('layout')

@section('title')
  <h1 class='title appTitle'>Price list of drugs by category</h1>
@endsection

@section('content')
  <div class='box appForm-container'>
    @foreach($categories as $category)
      <section class="hero is-info is-small">
        <div class="hero-body">
          <div class="container">
            <h3 class="title">
              {{ $category->title }}
            </h3>
          </div>
        </div>
      </section>
      <table class='table is-fullwidth'>
        <thead>
          <tr>
            <th>Name</th>
            <th>Unit of Measurement / Packing</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody>
          @foreach($drugs as $drug)
            @if($drug->category->id == $category->id)
              <tr>
                <td>
                  <a href='/drugs/{{ $drug->id }}'>
                    {{ $drug->title }}
                  </a>
                </td>
                <td>
                    {{ $drug->measure }}
                </td>
                <td>
                  {{ $drug->getFormattedPrice() }}
                </td>
              </tr>
            @endif
          @endforeach
        </tbody>
      </table>
    @endforeach
  </div>
@endsection
