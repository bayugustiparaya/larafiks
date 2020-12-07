
@extends('layouts.app')
@section('title', 'Order')

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
      <a href="{{route('product.add.index')}}" class="btn btn-dark">Add Product</a>
    </div>

    @else 

    <h1 class="text-center">Order</h1>
    <div class="row row-cols-1 row-cols-md-3">

      {{-- for --}}
      @foreach ($product as $index=>$products)
      <div class="col mb-4">
        <div class="card h-100">
          @if ($products->img_path === null || $products->img_path === "")
          <img src="{{ url('storage/wadmodul5.jpg') }}" class="card-img-top">
          @else
          <img src="{{ url('storage/'.$products->img_path) }}" class="card-img-top">
          @endif
          <div class="card-body">
            <h5 class="card-title">{{ $products->name }}</h5>
            <p class="card-text">{{ $products->description }}</p>
            <h4>$ {{ $products->price }}.00</h4>
            <a href="{{ route('order.add.index', $products->id) }}" class="btn btn-success">Order Now</a>
          </div>
        </div>
      </div>
      @endforeach
      {{-- endfor --}}

    </div>
    @endif

  </div>
@endsection
