@extends('layout')

@section('header')
    <link href="{{ asset('css/sebu.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <div>
        <div class="prod">
            <div class="product">
                <div id="cate">
                    {{ $product->category }}
                </div>
                <div id="pro_image">
                    <img src="{{ url("storage/$product->image") }}">
                </div>
            </div>

            <div class="product">
                <div id="name">
                    {{$product->name}}
                </div>

                <div id="price">
                    {{$product->price}}
                </div>

                <div id="address">
                </div>

                <form action="" method="POST">
                    @csrf
                    <div id="keep">
                        <div id="amount">
                            <input name="num" id="num" type="text" value="1" style="text-align:center;"/>
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <ul>
                                <li>
                                    <button class="num_button" type="button" onclick="fnCalCount('p',this);">+</button>
                                </li>
                                <li>
                                    <button class="num_button" type="button" onclick="fnCalCount('m', this);">-</button>
                                </li>
                            </ul>
                        </div>
                        <div id="cart">
                            <button class="cart_button" formaction = "/cart/add">장바구니 담기</button>
                        </div>
                        <div id="buy">
                            <button class="buy_button" formaction="/buy">바로 구매</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="info">
            <div class="information">
                {{$product->caption}}
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script src="{{ asset('js/sebu.js') }}"></script>
@endsection
