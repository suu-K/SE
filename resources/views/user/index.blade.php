@extends('layout')

@section('header')
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/index.css') }}"/>
@endsection

@section('content')
    <div class="display">
        <div class="event_banner">
            <ul class="slider">
                @foreach($events as $event)
                    <li class="event"><a href="#"><img src="{{ url("storage/$event->image")}}"></a></li>
                @endforeach
            </ul>
            <button type="button" class ="previous"><i class="fas fa-chevron-left"></i></button>
            <button type="button" class="next"><i class="fas fa-chevron-right"></i></button>
        </div>
    </div>

    <div class="display2">
        <p id="newProd">최신 등록 상품</p>
        <div class="items">
            @foreach($newProducts as $product)
            <a href="/product/detail/{{ $product->id }}"><div><div class="item_div"><img src="{{ url("storage/$product->image") }}"></div><div class="text_div">{{ $product->name }}</div></div></a>
            @endforeach
        </div>
    </div>
    <div class="display2">
        <p id="popular">인기 상품</p>
        <div class="items">
            @foreach($bestProducts as $product)
            <a href="/product/detail/{{ $product->id }}"><div><div class="item_div"><img src="{{ url("storage/$product->image") }}"></div><div class="text_div">{{ $product->name }}</div></div></a>
            @endforeach
        </div>
    </div>
@endsection

@section('footer')
    <script async src="{{ asset('js/index.js') }}"></script>
@endsection
