
@extends('layouts.app')
@section('title', 'History')

@section('content')
  <div class="container mt-5">

    @if (count($order) === 0)
    <div class="text-center">
      There is no data... <br>
      <a href="{{route('order.index')}}" class="btn btn-dark">Order Now</a>
    </div>

    @else

    <h1 class="text-center">History</h1>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Product</th>
          <th scope="col">Buyer Name</th>
          <th scope="col">Contact</th>
          <th scope="col">Amount</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($order as $index=>$histories)
        <tr>
          <th scope="row">{{ ++$i }}</th>
          <td>{{ $histories->name }}</td>
          <td>Rizky</td>
          <td>0908080808</td>
          <td>$200.00</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @endif

  </div>
@endsection
