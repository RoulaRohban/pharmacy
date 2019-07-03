@extends('layout')

@section('title')
  <h1 class='title appTitle'>Drug List</h1>
@endsection

@section('content')
  <table class='table appTable'>
    <thead>
      <tr>
        <th>Drug name</th>
        <th>Provider</th>
        <th>Category</th>
        <th>Qty in stock</th>
        <th>unit of measurement</th>
        <th class='has-text-right'>Price</th>
        <th class='has-text-right'>Orginal Price</th>
        <th class='has-text-right'>Expired Date</th>
        <th>Purchase Date</th>
        <th class='has-text-right'>limitQTY</th>
      </tr>
    </thead>

    <tbody>
      @foreach($drugs as $drug)
        <tr>
          <td>
            <a href="/drugs/{{ $drug->id }}">{{ $drug->title }}</a>
          </td>
          <td>
            <a href="/providers/{{ $drug->provider->id }}">
              {{ $drug->provider->title }}
            </a>
          </td>
          <td>
            <a href="/categories/{{ $drug->category->id }}">
              {{ $drug->category->title }}
            </a>
          </td>
          <td class='has-text-right'>{{ $drug->balance }}</td>
          <td>{{ $drug->measure }}</td>
          <td class='has-text-right'>
            {{ number_format($drug->price, 2, '.', ' ') }} SP
          </td>
          <td class='has-text-right'>
            {{ number_format($drug->OrginalPrice, 2, '.', ' ') }} SP
          </td>
          <td>{{ $drug->ExpiredDate }}</td>
          <td>{{ $drug->PurchaseDate }}</td>
          <td class='has-text-right'>{{ $drug->limitQTY }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <a style="background-color: #34699A"  href='/drugs/create' class='button is-success'>
    <span  style="background-color: #34699A" class="icon is-small">
      <i class="fas fa-plus"></i>
    </span>
    <span style="background-color: #34699A">Add a Purchase order</span>
  </a>
@endsection
