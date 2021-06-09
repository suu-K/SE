@extends('layout')

@section('header')
    <link href="{{ asset('css/admin7.css') }}" rel="stylesheet" type="text/css">
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
                    <button class="sign" onclick="location.href='/admin9'">신규 등록</button>
                </div>
            </nav>
            </nav>
            <ul class="pageadmin">
                <div class="quest">
                    <div class="head_quest">
                        <div id="head_day">유효 기간</div>
                        <div id="head_buy">할인가격</div>
                        <div id="head_require">조건</div>
                        <div id="head_amount">수량</div>
                        <div id="head_del">삭제</div>

                        <li class="head_quest">
                            <form autocomplete="off" method="POST">
                                <div id="day">며칠<nav>까지</nav></div>
                                <div id="buy">6000<nav>원</nav></div>
                                <div id="require">50000<nav>원 이상</nav></div>
                                <div id="amount">10<nav>개</nav></div>
                                <div id="del"><button formaction="">삭제</button></div>
                            </form>
                        </li>
                        @foreach($coupons as $coupon)
                            <li class="head_quest">
                                <form autocomplete="off" method="POST">
                                    <div id="day">{{ $coupon->ldate}}<nav>까지</nav></div>
                                    <div id="buy">{{ $coupon->sale_price}}<nav>원</nav></div>
                                    <div id="require">{{ $coupon->condition}}<nav>원 이상</nav></div>
                                    <div id="amount">10<nav>개</nav></div>
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
    <script src="{{ asset('js/admin7.js') }}"></script>
@endsection
