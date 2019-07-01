@extends('layout')

@section('title')
  <h1 class='title appTitle'>Pharmacy Profit</h1>
  <div class='is-hidden-print' style='margin-bottom: 1rem'>
  <div class='columns is-vcentered'>
    <div class='column is-narrow'>
      <h3>Choose year: </h3>
    </div>
    <div class='column is-narrow'>
      <form action='/profit' method='GET'>
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
<h1 class='title appTitle'>Profits for {{ $year }} year</h1>
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
                   @empty($purchase[$index])
          <div class="notification is-info has-text-centered" style='margin-top: 0.5rem'>
           No Purchases
            </div>
            @endempty
        @isset($sales[$index])
          <table class='table is-fullwidth'>
            <thead>
              <tr>
                <th>History</th>
                <th>Quantity of Drug</th>
                <th>revenue</th>
                <th>expense</th>
                <th>Profit {{ $month }}</th>
              </tr>
            </thead>
            <tbody>
              <?php $j=0;  ?>
              <?php $i=0;?>
            @foreach($sales[$index] as $sale)
              <tr>
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
                      </td>
                      <td>0 SP</td>
                      <td>{{ $drug->pivot->amount * $drug->price }} </td>
                      <?php $j+= $drug->pivot->amount * $drug->price ; ?>
                      </tr>
                      <tr>
                      <td>
                  {{ $drug->PurchaseDate }}
                      </td>
                        <td>
                       <p>
                      <a href='/drugs/{{ $drug->id }}'>
                        {{ $drug->title }}
                      </a>
                      x
                      {{ $drug->balance }}
                      </p>
                      </td>
                      <td>{{ $drug->balance * $drug->OrginalPrice }} </td>
                     <td>0 SP</td>
                      </tr>
                    <?php $i+=$drug->OrginalPrice * $drug->balance ; ?>
                  @endforeach
            @endforeach
            </tbody>
            <?php echo $j-$i ; ?>
          </table>
        @endisset
      @endif
    @endforeach
  </div>
 @endsection