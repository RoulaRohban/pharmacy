@extends('layout')

@section('title')
  <h1 class='title appTitle'>Sales List</h1>
@endsection

@section('content')
  <table class='table is-fullwidth'>
    <thead>
    <tr>
      <th>Check number</th>
      <th>date</th>
      <th>Preparations</th>
      <th class='has-text-right'>Amount</th>
      <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($sales as $sale)
      <tr>
        <td>
          <a href='/receipts/{{ $sale->id }}'>
            {{ $sale->id }}
          </a>
        </td>
        <td>
          {{ date_format($sale->created_at, "d.m.Y") }}
        </td>
        <td>
          @foreach($sale->drugs as $drug)
            <p>
              <a href='/drugs/{{ $drug->id }}'>
                {{ $drug->title }}
              </a>
              x
              {{ $drug->pivot->amount }}
            </p>
          @endforeach
        </td>
        <td class='has-text-right'>
          {{ number_format($sale->drugs->reduce(function($sum, $drug) {
            return $sum + $drug->price * $drug->pivot->amount;
          }), 2, '.', ' ').' SP'}}
        </td>
        <td>
          <a class='button is-link'
             href='/receipts/{{ $sale->id }}'>
            <span class='icon is-small'>
              <i class='fas fa-receipt'></i>
            </span>
            <span>Sales receipt</span>
          </a>
        </td>
        {{--<td>--}}
        {{--<a href='/drugs/{{ $trans->drug->id }}'>--}}
        {{--{{ $trans->drug->title }}--}}
        {{--</a>--}}
        {{--</td>--}}
        {{--<td>--}}
        {{--{{ $trans->amount }}--}}
        {{--</td>--}}
        {{--<td class='has-text-right'>--}}
        {{--{{number_format($trans->drug->price * $trans->amount, 2, '.', ' ').' SP'}}--}}
        {{--</td>--}}
      </tr>
    @endforeach
    </tbody>
  </table>
@endsection
