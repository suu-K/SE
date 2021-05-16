@extends('layout')

@section('header')
    <link href="{{ asset('css/products.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="display">
        <div class="items">
            @empty($products)
            <div>상품 준비중입니다</div>
            @endempty
            @foreach($products as $product)
            <a href="/product/detail/{{ $product->id }}"><div><div class="item_div"><img src="{{ url("storage/$product->image") }}"></div><div class="text_div">{{ $product->name }}</div></div></a>
            @endforeach
        </div>
        <nav class="paging"></nav>
    </div>
@endsection

@section('footer')
    <script async src="{{ asset('js/products.js') }}"></script>
@endsection
