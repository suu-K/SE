@extends('layout')

@section('header')
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/index.css') }}"/>
@endsection

@section('content')
    <div id="wrapper">
        <div id="slider-wrap">
            <ul id="slider">
                @foreach($events as $event)
                    <li>
                        <div>
                            <h3>{{ $event->title }}</h3>
                            <span>{{ $event->body }}</span>
                        </div>
                        <img src="{{ url("storage/$event->image")}}" onclick="javascript:location.href='address.html'">
                    </li>
                @endforeach
            </ul>

            <div class="btns" id="next"><i class="fa fa-arrow-right"></i></div>
            <div class="btns" id="previous"><i class="fa fa-arrow-left"></i></div>

            <!--counter는 오른쪽 위에 1/5요거-->
            <div id="counter"></div>
            <!--pagination-wrap은 하얀색 점들.-->
            <div id="pagination-wrap">
              <ul>
              </ul>
            </div>
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
