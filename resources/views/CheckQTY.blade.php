@extends('layout')

@section('title')
  <h1 class='title appTitle'>Drug Underlimit QTY</h1>
@endsection

@section('content')
  <table class='table appTable'>
    <thead>
      <tr>
        <th>Drug name</th>
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
             <td>

           <a style="background-color: #34699A"  href='/drugs/{{ $drug->id }}/edit' class='button is-success'>
                  <span>
                   <i style="background-color: #34699A" class="fas fa-edit"></i>
                   </span>
                                     <span style="background-color: #34699A">Change</span>

                  </a>
                      </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
href='/drugs/{{ $drug->id }}/edit'