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
                <div id="wrapper">
                    <div id="slider-wrap">
                        <ul id="slider">
                            @foreach($images as $image)
                            <li>
                                <img src="{{ url("storage/$image->url") }}">
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
            </div>

            <div class="product">
                <div id="name">
                    {{$product->name}}
                </div>

                <div id="price">
                    {{$product->price}}
                </div>


                <form method="POST">
                    @csrf
                    <div id="addressTab">
                        <div>
                            <ul id="selectAdd">
                                @foreach($addresses as $address)
                                <li><label><input type="radio" name="addlist" id="addinfo" @if($loop->iteration == 1) checked @endif>이름</label></li>
                                @endforeach
                                <li><label><input type="radio" name="addlist" id="new">새로운 배송지</label></li>
                            </ul>
                            <div class="tog" style="width:500px;">
                                @foreach($addresses as $address)
                                <ul class="@if($loop->iteration == 1) active @endif test" id="addinfo{{ $loop->iteration }}">
                                    <li>
                                        <div class="infoName">배송지</div>
                                        <div class="inform">{{ $address->destination }}</div>
                                    </li>
                                    <li>
                                        <div class="infoName">주소</div>
                                        <div class="inform">{{ $address->postcond }} {{ $address->address }} {{ $address->detailAddress }} {{ $address->extraAddress }}</div>
                                    </li>
                                    <li>
                                        <div class="infoName">연락처</div>
                                        <div class="inform">{{ $address->phone }}</div>
                                    </li>
                                </ul>
                                @endforeach

                                <ul class="test" id="newinfo">
                                    <li id="desli">배송지<input type="text" id="destination" name="destination" autocomplete="off"></li>
                                    <li>
                                        <input type="text" id="postcode" name="postcode" placeholder="우편번호" autocomplete="off">

                                    <button class="address_button" type="button" onclick="execDaumPostcode()">주소 찾기</button>
                                    </li>
                                    <li><input type="text" id="address" name="address" placeholder="주소" autocomplete="off"><br></li>
                                    <li>
                                        <input type="text" id="detailAddress" name="detailAddress" placeholder="상세주소" autocomplete="off">
                                        <input type="text" id="extraAddress" name="extraAddress" placeholder="참고항목" autocomplete="off">
                                    </li>
                                    <li>
                                        <div>연락처 <input type="text" pattern="[0-9]{11,11}$" name="phone" id="phoneNo" placeholder="전화번호" onfocus="this.placeholder=''" onblur="this.placeholder='전화번호'" title="-없이 숫자 11자리를 입력하세요."></div>
                                    </li>
                                </ul>

                            </div>
                            <button type="button" onclick="showPopup()">배송지 등록/수정</button>
                        </div>
                    </div>
                    @csrf
                    <div id="keep">
                        <div class="sub">
                                <div style="display: flex; margin-bottom: 10px;">
                                    <input name="num" id="num" type="text" value="1"  style="text-align:center;"/>
                                    <ul>
                                        <li>
                                            <button class="num_button" type="button" onclick="fnCalCount('p',this);">+</button>
                                        </li>
                                        <li>
                                            <button class="num_button" type="button" onclick="fnCalCount('m', this);">-</button>
                                        </li>
                                    </ul>
                                </div>
                        </div>
                        <div class="sub">
                            <div id="buySector">
                                <div id="cart">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button class="cart_button" formaction="/cart/add">장바구니 담기</button>
                                </div>
                                <div id="buy">
                                    <button class="buy_button" formaction="/buy">바로 구매</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="info">
            <div class="information">
            <pre>
                {{$product->caption}}
            </pre>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script src="{{ asset('js/sebu.js') }}"></script>
@endsection