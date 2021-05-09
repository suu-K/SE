@extends('admin.layout')

@section('header')
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/admin.css') }}"/>
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/index.css') }}"/>
@endsection

@section('content')
    <div class="display">
        <div class="event_banner">
            <ul class="slider">
                <li class="event"><img src="C:\Users\USER\Web_Front\SE_project_1\image\event\test_img.jpg"></li>
                <li class="event"><img src="C:\Users\USER\Web_Front\SE_project_1\image\event\test_img2.png"></li>
                <li class="event"><img src="C:\Users\USER\Web_Front\SE_project_1\image\event\test_img3.jpg"></li>
            </ul>
            <p class ="previous"><i class="fas fa-chevron-left"></i></p>
            <p class = "next"><i class="fas fa-chevron-right"></i></p>>
        </div>
    </div>

    <div class="display2">
        <div class="items">
            @foreach($products as $product)
            <a href="{{ $product->id }}"><div class="item_div"><img src="{{ url("/storage/$product->image") }}">{{ $product->name }}</div></a>
            @endforeach
        </div>
    </div>

    @endsection
