@extends('layout')

@section('title')
  <h1 class='title appTitle'>List of Suppliers</h1>
@endsection

@section('content')
  <table class='table appTable'>
    <thead>
    <tr>
      <th>Supplier name</th>
      <th>City</th>
      <th>Address</th>
      <th>Representative Name</th>
      <th>Phone</th>
    </tr>
    </thead>

    <tbody>
    @foreach($providers as $provider)
      <tr>
        <td>
          <a href="/providers/{{ $provider->id }}">{{ $provider->title }}</a>
        </td>
        <td>{{ $provider->city }}</td>
        <td>{{ $provider->address }}</td>
        <td>{{ $provider->manager }}</td>
        <td>
          <a href="tel:{{ $provider->phone }}">
            {{ $provider->phone }}
          </a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  <a href='/providers/create' class='button is-success'>
    <span class="icon is-small">
      <i class="fas fa-plus"></i>
    </span>
    <span>Add Supplier</span>
  </a>
@endsection
