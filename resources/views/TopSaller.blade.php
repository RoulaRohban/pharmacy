@extends('layout')

@section('title')
  <h1 class='title appTitle'>Drug Top saler</h1>
@endsection

@section('content')
  <table class='table appTable'>
    <thead>
      <tr>
        <th>Drug name</th>
        <th>amount of sale</th>
        <th></th>
      </tr>
    </thead>

    <tbody>
      @foreach($items as $item)
        <tr>
          <td>{{ $item->drug }}</td>
          <td>{{ $item->sum }}</td>
          <td>
           <a style="background-color: #34699A"  href='/drugs/{{ $item->id }}/edit' class='button is-success'>
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
