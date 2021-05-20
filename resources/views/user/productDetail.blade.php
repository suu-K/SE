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
                    <ul class="slider">
                        @foreach($images as $image)
                        <li class="picture"><img src="{{ url("storage/$image->url") }}"></li>
                        @endforeach
                    </ul>

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
                                <li><label><input type="radio" name="addlist" id="first" checked>이름</label></li>
                                <li><label><input type="radio" name="addlist" id="second">이름</label></li>
                                <li><label><input type="radio" name="addlist" id="new">새로운 배송지</label></li>
                            </ul>
                            <div class="tog" style="width:500px;">
                                <ul class="active test" id="addinfo1">
                                    <li>
                                        <div class="infoName">배송지</div>
                                        <div class="inform">집</div>
                                    </li>
                                    <li>
                                        <div class="infoName">주소</div>
                                        <div class="inform">서울특별시 도봉구 우이천로 394 (쌍문동) 경기도 장학관 율곡 453호</div>
                                    </li>
                                    <li>
                                        <div class="infoName">연락처</div>
                                        <div class="inform">010-4165-9853</div>
                                    </li>
                                </ul>

                                <ul class="test" id="addinfo2">
                                    <li>
                                        <div class="infoName">배송지</div>
                                        <div class="inform">집1</div>
                                    </li>
                                    <li>
                                        <div class="infoName">주소</div>
                                        <div class="inform">서울특별시1 도봉구 우이천로 394 (쌍문동) 경기도 장학관 율곡 453호</div>
                                    </li>
                                    <li>
                                        <div class="infoName">연락처</div>
                                        <div class="inform">010-4165-9853f</div>
                                    </li>
                                </ul>
                                @if($addresses != null)
                                @foreach($addresses as $address)
                                <ul class="test" id="addinfo2">
                                    <li>
                                        <div class="infoName">배송지</div>
                                        <div class="inform">{{ $address->destination }}</div>
                                    </li>
                                    <li>
                                        <div class="infoName">주소</div>
                                        <div class="inform">{{ $address->address }}</div>
                                    </li>
                                    <li>
                                        <div class="infoName">연락처</div>
                                        <div class="inform">{{ $address->phone }}</div>
                                    </li>
                                </ul>
                                @endforeach
                                @endif
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
                                        <div>연락처 <input type="text" pattern="[0-9]{11,11}$" name="phone" id="phoneNo" placeholder="전화번호" onfocus="this.placeholder=''" onblur="this.placeholder='전화번호'" title="-없이 숫자 11자리를 입력하세요." required></div>
                                    </li>
                                </ul>

                            </div>
                            <button type="button" onclick="showPopup()">배송지 등록/수정</button>
                        </div>
                    </div>
                </form>
                <form method="POST">
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
                {{$product->caption}}
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script src="{{ asset('js/sebu.js') }}"></script>
@endsection
