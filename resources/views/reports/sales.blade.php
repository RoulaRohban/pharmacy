@extends('layout')

@section('title')
  <div class='is-hidden-print' style='margin-bottom: 1rem'>
  <div class='columns is-vcentered'>
    <div class='column is-narrow'>
      <h3>Choose year: </h3>
    </div>
    <div class='column is-narrow'>
      <form action='/sales' method='GET'>
        <div class="select">
          <select name='year' aria-label='Year' onchange='this.form.submit()'>
            @for($y = $max_year; $y >= $min_year; $y--)
              <option value='{{ $y }}' {{ $y == $year ? 'selected' : '' }}>
                {{ $y }}
              </option>
            @endfor
          </select>
        </div>
      </form>
    </div>
    <div class='is-narrow'>
      <button class='button is-warning is-hidden-print' onclick='window.print()'>
        <span class='icon is-small'>
          <i class='fas fa-print'></i>
        </span>
        <span>Print</span>
      </button>
    </div>
  </div>
  </div>
  <h1 class='title appTitle'>List of sales for {{ $year }} year</h1>
@endsection

@section('content')
  <div class='box appForm-container'>
    @foreach($months as $index => $month)
      @if($year == $max_year && $index > $current_month)
      @else
        <section class="hero is-warning is-small">
          <div class="hero-body">
            <div class="container">
              <h3 class="title">
                {{ $month }}
              </h3>
            </div>
          </div>
        </section>
        @empty($sales[$index])
          <div class="notification is-info has-text-centered" style='margin-top: 0.5rem'>
           No sales
          </div>
        @endempty
        @isset($sales[$index])
          <table class='table is-fullwidth'>
            <thead>
              <tr>
                <th>Check number</th>
                <th>date</th>
                <th>Preparations</th>
                {{--<th>Qty</th>--}}
                <th class='has-text-right'>Amount</th>
              </tr>
            </thead>
            <tbody>
            @foreach($sales[$index] as $sale)
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
        @endisset
      @endif
    @endforeach
  </div>
@endsection
