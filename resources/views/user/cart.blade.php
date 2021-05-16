@extends('layout')

@section('header')
<link href="{{ asset('css/products.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    @foreach($carts as $product)
    <form action="/cart/delete" method="post">
        @csrf
        상품 이름 : {{$product->name}}, 상품 수량 : {{ $product->num}}, 상품 가격 : {{ $product->sale_price }}, 상품 총액 : {{$product->sale_price * $product->num}}
        <input type="hidden" name="id" value="{{$product->id}}">
        <button>삭제</button>
    </form>
    <br>
    @endforeach
@endsection

@section('footer')

@endsection
