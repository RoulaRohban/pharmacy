@extends('layout')

@section('title')
  <h1 class='title appTitle'>Add sale</h1>
@endsection

@section('content')
  <div class='box appForm-container'>
    <form action='/sales' method='POST' id='create-sale-form'>
      @csrf
      <drugs-select :drugs='{!! json_encode($drugs) !!}'></drugs-select>
    </form>
  </div>
@endsection