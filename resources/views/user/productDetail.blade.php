@extends('layout')

@section('header')
    <link href="{{ asset('css/sebu.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
<div>
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
                                @if($default == null)
                                @foreach($addresses as $address)
                                <li><label><input type="radio" name="addlist" id="addinfo" @if($loop->iteration == 1) checked @endif>{{ $address->destination }}</label></li>
                                @endforeach
                                @else
                                <li><label><input type="radio" name="addlist" id="addinfo" checked>기본 배송지</label></li>
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
                                    </li>
                                    <li>
                                        <div class="infoName">연락처</div>
                                        <div class="inform">{{ $default->phone }}</div>
                                    </li>
                                </ul>
                                @endif

                                <ul class="@if($addresses->count() == 0) active @endif test" id="newinfo">
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
                            <button type="button" onclick="showPopup()" @auth @if(Auth::user()->id < 3) disabled @endif @endauth>배송지 선택/관리</button>
                        </div>
                    </div>
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
                                    <button class="cart_button" formaction="/cart/add" @auth @if(Auth::user()->id<3) disabled  @endif @endauth>장바구니 담기</button>
                                </div>
                                <div id="buy">
                                    <button class="buy_button" formaction="/pay" disabled>바로 구매</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="info">
            <div class="information">{{$product->caption}}</div>
        </div>
    </div>


    <div class="r">
        <div class="review">
            <div class="averscore">
                <h2>상품평</h2>
                @if($average == null)
                <div>아직 등록된 상품평이 없습니다</div>
            </div>
            @else
                <div id="averscore">평균점수 <nav> {{ $average }} / 5.0</nav></div>
            </div>
            @foreach($comments as $comment )
            <div class="reviewlist">
                <div class="recommend">
                    추천 여부
                </div>
                <div class="speed">
                    배송속도
                </div>
                <div class="score">
                    점수
                </div>
                <div class="rev">
                    내용
                </div>
                <div class="person">
                    <div id="name">
                        이름
                    </div>
                    <div id="day">
                        날짜
                    </div>
                </div>
            </div>
            <div class="reviewlist">
                <div class="recommend">
                    @switch($comment->recommend)
                    @case(1) 비추천 @break;
                    @case(2) 추천 @break;
                    @case(3) 적극추천 @break;
                    @endswitch
                </div>
                <div class="speed">
                    @switch($comment->speed)
                    @case(1) 느림 @break;
                    @case(2) 보통 @break;
                    @case(3) 빠름 @break;
                    @endswitch
                </div>
                <div class="score">
                    {{$comment->rating}}<nav> / 5</nav>
                </div>
                <div class="rev">
                    {{$comment->evaluation}}
                </div>
                <div class="person">
                    <div id="name">
                        {{$comment->name}}
                    </div>
                    <div id="day">
                        {{$comment->created_at}}
                    </div>
                </div>
            </div>
            @endforeach
            {{ $comments->withQueryString()->links() }}
            @endif
        </div>
    </div>
</div>
@endsection

@section('footer')
    <script src="{{ asset('js/sebu.js') }}"></script>
@endsection
