@extends('layout')

@section('header')
<link href="{{ asset('css/admin8.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="ctrMenu">
    <aside class="tab">
        <ul>
            <li><a href="/admin">공지/이벤트 관리</a></li>
            <li><a href="/admin2">상품관리</a></li>
            <li><a href="/admin4">상품 판매 정보</a></li>
            <li><a href="/admin5">고객 문의 관리</a></li>
            <li class="active"><a href="/admin6">쿠폰 등록/관리</a></li>
        </ul>
    </aside>
    <div class="ctr">
        <div class="test" id="event" action="#" method="POST">
            <nav class="range" style="padding-top:50px; margin-left: 30px;">
                <div style="padding-bottom:30px;">
                    <input type=date> ~ <input type=date>
                    <button formaction="#">검색</button>
                    <button class="sign" onclick="location.href='/admin10'">신규 등록</button>
                </div>
            </nav>
            </nav>
            <ul class="pageadmin">
                <div class="quest">
                    <div class="head_quest">
                        <div id="head_day">유효 기간</div>
                        <div id="head_cate">카테고리</div>
                        <div id="head_per">할인퍼센트</div>
                        <div id="head_max">최대 할인가</div>
                        <div id="head_amount">수량</div>
                        <div id="head_del">삭제</div>

                        <li class="head_quest">
                            <form>
                                <div id="day">문의날짜</div>
                                <div id="cate">카테고리</div>
                                <div id="per">몇<nav>%</nav></div>
                                <div id="max">몇<nav>원</nav></div>
                                <div id="amount">몇<nav>개</nav></div>
                                <div id="del"><button formaction="">삭제</button></div>
                            </form>
                        </li>
                        @foreach($coupons as $coupon)
                            <li class="head_quest">
                                <form>
                                    <div id="day">{{ $coupon->ldate}}</div>
                                    <div id="cate">{{ $coupon->category}}</div>
                                    <div id="per">{{ $coupon->sale_percent}}<nav>%</nav></div>
                                    <div id="max">{{ $coupon->max_sale_price}}<nav>원</nav></div>
                                    <div id="amount">몇<nav>개</nav></div>
                                    <div id="del"><button formaction="">삭제</button></div>
                                </form>
                            </li>
                        @endforeach
                    </div>
                </div>
            </ul>
            {{ $coupons->withQueryString()->links() }}
        </div>


    </div>
</div>
@endsection

@section('footer')
<script src="{{ asset('js/admin8.js') }}"></script>
@endsection
