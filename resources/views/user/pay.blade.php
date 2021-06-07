@extends('layout')

@section('header')
    <link href="{{ asset('css/pay.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <body>
        <form action="#" accept-charset="utf-8" method="POST" onkeydown="return captureReturnKey(event)">
            @csrf
        <div class="prod">
            <div id="product">
                <!--  head -->

                <div id="head_name">
                    상품명
                </div>
                <div id="head_delivery">
                    배송비
                </div>
                <div id="head_price">
                    개별가
                </div>
                <div id="head_amount">
                    수량
                </div>
                <div id="head_price">
                    총액
                </div>

                <!--  -->
                {{ session()->put('sum', 0), session()->put('delivery', 0) }}
                @foreach($carts as $product)
                <div id="name"><a href="/product/detail/{{ $product->product_id }}">{{ $product->name }}</a></div>
                <div class="delivery">{{$product->delivery}}</div>
                <div class="price" id="price{{ $loop->iteration }}">{{ $product->sale_price }}</div>
                <div id="amount"><div id="sumprice{{ $loop->iteration }}">{{ $product->num }}</div></div>
                <div id="price"><div id="sumprice{{ $loop->iteration }}">{{ $product->sale_price * $product->num }}원</div></div>
                {{ session()->put('sum', session('sum') + ($product->sale_price * $product->num)) }}
                {{ session()->put('delivery', max(session('delivery'), $product->delivery ))}}
                @endforeach


                <!--  -->


                <div class="result"><p>총 금액 + 배송비 = 결제 금액</p><p>{{ session('sum') }} + {{ session('delivery') }} = {{ session('sum')+session('delivery') }}원</p></div>
                <input type="hidden" value="{{ session('sum')+session('delivery') }}" name="price">

                <div id="addressTab">
                    <div>
                        <ul id="selectAdd">
                            @if($default == null)
                            @foreach($addresses as $address)
                            <li><label><input type="radio" name="addlist" id="addinfo" value={{$loop->iteration}} @if($loop->iteration == 1) checked @endif>{{ $address->destination }}</label></li>
                            @endforeach
                            @else
                            <li><label><input type="radio" name="addlist" id="addinfo" value="default" checked>기본 배송지</label></li>
                            @endif
                            <li><label><input type="radio" name="addlist" id="new" @if($addresses->count() == 0) checked @endif>새로운 배송지</label></li>
                        </ul>
                        <div class="tog" style="width:500px;">
                            @if($default == null)
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
                            @else
                            <ul class="active test" id="addinfo1">
                                <li>
                                    <div class="infoName">배송지</div>
                                    <div class="inform">{{ $default->destination }}</div>
                                </li>
                                <li>
                                    <div class="infoName">주소</div>
                                    <div class="inform">{{ $default->postcond }} {{ $default->address }} {{ $default->detailAddress }} {{ $default->extraAddress }}</div>
                                <li>
                                    <div class="infoName">연락처</div>
                                    <div class="inform">{{ $default->phone }}</div>
                                </li>
                            </ul>
                            @endif

                            <ul class="@if($addresses->count() == 0) active @endif test" id="newinfo">
                                <li id="desli">배송지<input type="text" id="destination" name="destination" value={{ $default->destination }} autocomplete="off"></li>
                                <li>
                                    <input type="text" id="postcode" name="postcode" placeholder="우편번호" value={{ $default->postcode }} autocomplete="off">

                                <button class="address_button" type="button" onclick="execDaumPostcode()">주소 찾기</button>
                                </li>
                                <li><input type="text" id="address" name="address" placeholder="주소" value={{ $default->address }} autocomplete="off"><br></li>
                                <li>
                                    <input type="text" id="detailAddress" name="detailAddress" placeholder="상세주소" value={{ $default->detailAddress }} autocomplete="off">
                                    <input type="text" id="extraAddress" name="extraAddress" placeholder="참고항목" value={{ $default->extraAddress }} autocomplete="off">
                                </li>
                                <li>
                                    <div>연락처 <input type="text" pattern="[0-9]{11,11}$" name="phone" id="phoneNo" value={{ $default->phone }} placeholder="전화번호" onfocus="this.placeholder=''" onblur="this.placeholder='전화번호'" title="-없이 숫자 11자리를 입력하세요."></div>
                                </li>
                            </ul>

                        </div>
                        <button type="button" onclick="showPopup()" @auth @if(Auth::user()->id < 3) disabled @endif @endauth>배송지 선택/관리</button>
                    </div>
                </div>
                <!--  -->
                <div class="buy">
                    <button type="button" onclick="window.open('/coupon','czxcxz','width=700,height=500,location=no,status=no,scrollbars=yes');">
			    쿠폰사용</button>
                    <button value="" formaction="/pay">결제하기</button>
                </div>
            </div>
        </div>
        </form>
    </body>
@endsection

@section('footer')
    <script async src="{{ asset('js/pay.js') }}"></script>
@endsection
