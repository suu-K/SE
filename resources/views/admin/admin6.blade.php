@extends('layout')

@section('header')
<link href="{{ asset('css/admin6.css') }}" rel="stylesheet" type="text/css" />
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
                </div>
            </nav>
            </nav>
            <ul class="pageadmin">
                <div class="quest">
                    <div class="price" onclick="location.href='/admin7';">
                        일정가 이상 할인 쿠폰
                    </div>
                    <div class="cate" onclick="location.href='/admin8';">
                        특정 카테고리 할인 쿠폰
                    </div>
                </div>
            </ul>
        </div>


    </div>
</div>
@endsection

@section('footer')
<script src="{{asset('js/admin6.js') }}"></script>
@endsection
