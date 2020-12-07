
@extends('layouts.app')
@section('title', 'Ordering')

@section('content')
  <div class="container mt-5">
    <h1 class="text-center">Order</h1>
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-8">
            <img src="{{ url('storage/'.$product->img_path) }}" class="img-fluid">
          </div>
          <div class="col-md-4"><br><br>
            <h4>{{ $product->name }}</h4>
            <p>{{ $product->description }}</p>
            <p>Stok : {{ $product->stock }}</p>
            <h4>$ {{ $product->price }}.00</h4>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="card">
      <div class="card-body">
        <h3 class="text-center">Buyer Information</h3>
        <form action="{{route('order.add')}}" method="POST">
          @csrf
          <input type="hidden" name="productid" value="{{ $product->id }}">
          <div class="form-group">
            <label for="inName">Name</label>
            <input type="text" class="form-control" id="inName" name="buyername" required>
          </div>
          <div class="form-group">
            <label for="inContact">Contact</label>
            <input type="text" class="form-control" id="inContact" name="buyercontact" required>
          </div>
          <div class="form-group">
            <label for="inQuantity">Quantity</label>
            <input type="number" class="form-control col-md-4" id="inQuantity" name="quantity" required>
          </div>
          <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>
  </div>
@endsection
