@extends('layout')

@section('title')
  <h1 class='title appTitle'>Category List</h1>
@endsection

@section('content')
  <table class='table appTable'>
    <thead>
    <tr>
      <th>Name</th>
      <th>Description</th>
    </tr>
    </thead>

    <tbody>
    @foreach($categories as $category)
      <tr>
        <td>
          <a href="/categories/{{ $category->id }}">{{ $category->title }}</a>
        </td>
        <td style='max-width: 600px'>
          {{ $category->description }}
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  <a href='/categories/create' class='button is-success'>
    <span class="icon is-small">
      <i class="fas fa-plus"></i>
    </span>
    <span>Add a category</span>
  </a>
@endsection
