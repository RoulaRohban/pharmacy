@extends('layout')

@section('summary')
  <div style='margin-bottom: 1rem'>
    <p><strong>Name of company:</strong> UniPharma</p>
    <p><strong>Phone:</strong> +963997166694</p>
    <p><strong>Address:</strong> Damas Street 18</p>
  </div>
@endsection

@section('title')
  <h1 class='title appTitle'>Sales receipt number {{ $sale->id }} from {{ date_format($sale->created_at, "d.m.Y") }}</h1>
@endsection

@section('content')
  <table class='table is-bordered'>
    <thead>
      <tr>
        <th>Number</th>
        <th>Name of Drug</th>
        <th>unit of measurement</th>
        <th class='has-text-right'>Price for 1 unit.</th>
        <th>Qty</th>
        <th class='has-text-right'>Amount</th>
      </tr>
    </thead>
    <tbody>
      @foreach($sale->drugs as $index => $drug)
        <tr>
          <td>{{ $index + 1 }}</td>
          <td>{{ $drug->title }}</td>
          <td>{{ $drug->measure }}</td>
          <td class='has-text-right'>{{ number_format($drug->price, 2, '.', ' ').' SP' }}</td>
          <td>{{ $drug->pivot->amount }}</td>
          <td class='has-text-right'>{{ number_format($drug->price * $drug->pivot->amount, 2, '.', ' ').' SP' }}</td>
        </tr>
      @endforeach
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><strong>Total :</strong></td>
        <td class='has-text-right'><strong>{{ number_format($sale->drugs->reduce(function($sum, $drug){
          return $sum + $drug->price * $drug->pivot->amount;
        }), 2, '.', ' ').' SP' }}</strong></td>
      </tr>
    </tbody>
  </table>

  <div class='columns' style='justify-content: flex-end'>
    <div class='column is-narrow'>
      <button class='button is-warning is-hidden-print' onclick='window.print()'>
        <span class='icon is-small'>
          <i class='fas fa-print'></i>
        </span>
        <span>Print</span>
      </button>
    </div>
  </div>
@endsection
