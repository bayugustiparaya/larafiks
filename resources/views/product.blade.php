
@extends('layouts.app')
@section('title', 'Product')

@section('content')
  <div class="container mt-5">
    @if ($message = Session::get('message'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
      {{ $message }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    @if (count($product) === 0)
    <div class="text-center">
      There is no data... <br>
      <a href="{{ route('product.add') }}" class="btn btn-dark">Add Product</a>
    </div>
  
    @else
    
    <h1 class="text-center">List Product</h1>
    <a href="{{ route('product.add') }}" class="btn btn-dark">Add Product</a><br><br>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Price</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($product as $index=>$products)
        <tr>
        <th scope="row">{{ ++$i }}</th>
          <td>{{ $products->name }}</td>
          <td>$ {{ $products->price }}.00</td>
          <td>
            <a href="{{ route('product.update.index', $products->id) }}" class="btn btn-primary btn-sm">Edit</a>
            <a href="{{ route('product.delete', $products->id) }}" class="btn btn-danger btn-sm">Delete</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @endif

  </div>
@endsection
