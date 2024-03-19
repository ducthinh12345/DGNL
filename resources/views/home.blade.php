@extends('layouts.app')

@section('content')
user

<h1>Export Products</h1>
<form method="post" action="{{ route('addOrder') }}">
    @csrf

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Number</th>
                <!-- Thêm các cột khác nếu cần -->
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td><input type="number" id="quantity" name="quantity[{{ $product->id }}]" value="0" min="0"></td>
                <!-- Hiển thị các thông tin khác của sản phẩm -->
            </tr>
            @endforeach
        </tbody>
    </table>
    <button type="submit">Add to Order</button>
</form>
@endsection