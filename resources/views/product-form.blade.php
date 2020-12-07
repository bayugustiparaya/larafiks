
@extends('layouts.app')
@section('title', 'Product')

@section('content')
@if ($action === "add")
<?php   
$idproduct = "";
$name = "";
$price = "";
$description = "";
$stock = "";
$img_path = "";
$title = "Input ";
?>
@else 
<?php   
$idproduct = $product->id;
$name = $product->name;
$price = $product->price;
$description = $product->description;
$stock = $product->stock;
$img_path =$product->img_path;
$title = "Update ";
?>
@endif


  <div class="container mt-5">
    <h1 class="text-center">{{ $title }} Product</h1>
    @if ($action === "update")
    <form action="{{route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
    <input type="text" name="idproduct" value="{{ $idproduct }}" hidden required>
      {{-- <img src="{{ url('storage/'.$img_path) }}" class="img-thumbnail col-md-4"> --}}
    @else
    <form action="{{route('product.add')}}" method="POST" enctype="multipart/form-data">  
      @csrf
    @endif 
      <div class="form-group">
        <label for="inNamaProduct">Product Name</label>
        <input type="text" class="form-control" id="inNamaProduct" name="namaproduct" value="{{ $name }}" required>
      </div>
      <div class="form-group">
        <label for="inPrice">Price</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">$ USD</div>
          </div>
          <input type="number" class="form-control" id="inPrice" name="price" value="{{ $price }}" required>
        </div>
      </div>
      <div class="form-group">
        <label for="inDesc">Description</label>
        <textarea class="form-control" id="inDesc" rows="4" name="description" required>{{ $description }}</textarea>
      </div>
      <div class="form-group">
        <label for="inStock">Stock</label>
        <input type="number" class="form-control col-md-4" id="inStock" name="stock" value="{{ $stock }}" required>
      </div>
      <div class="form-group">
        <label for="inGambar">Image file input</label>
        <input type="file" class="form-control-file" id="inGambar" name="file" accept="image/jpeg, image/pjpg, image/jpg, image/png" 
        @if ($action === "add")
        required    
        @endif
        >
      </div>
      <button type="submit" class="btn btn-dark" name="simpan">Submit</button>
    </form>
  </div>
@endsection
