@extends('layout')

@section('header')
<link href="{{ asset('css/admin5.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="ctrMenu">
    <aside class="tab">
        <ul>
            <li><a href="/admin">공지/이벤트 관리</a></li>
            <li><a href="/admin2">상품관리</a></li>
            <li><a href="/admin4">상품 판매 정보</a></li>
            <li class="active"><a href="/admin5">고객 문의 관리</a></li>
            <li><a href="/admin6">쿠폰 등록/관리</a></li>
        </ul>
    </aside>
    <div class="ctr">
        <div class="test" id="event">
            <nav class="range" style="padding-top:50px; margin-left: 30px;">
                <form action="#" method="POST"> @csrf
                <div style="padding-bottom:30px;">
                    <input type="date" name="sdate" value="{{ session()->pull('sdate') }}"></input> ~ <input type="date" name="ldate" value="{{ session()->pull('ldate') }}"></input>
                    <button formaction="/admin5">검색</button>
                </div>
                </form>
            </nav>
            </nav>
            <ul class="pageadmin">
                <div class="quest">
                    <div class="head_quest">
                        <div id="head_day">날짜</div>
                        <div id="head_buy">구매 정보</div>
                        <div id="head_title">문의 제목</div>
                        <div id="head_answer">답변</div>

                        @foreach($questions as $question)
                            <li class="head_quest">
                                <form>
                                    <div id="day">{{$question->created_at}}</div>
                                    <div id="buy">{{$question->name}}</div>
                                    <div id="title">{{$question->title}}</div>
                                    @if($question->answer == null)
                                    <div id="answer"><button onclick="window.open('/answer/{{ $question->id }}', 'a', 'width=500, height=500, left=100, top=50'); ">답변하기</button></div>
                                    @else
                                    <div id="answer"><button onclick="window.open('/questcontent/{{ $question->id }}', 'a', 'width=500, height=500, left=100, top=50'); ">답변완료</button></div>
                                    @endif
                                </form>
                            </li>
                        @endforeach
                    </div>
                </div>
            </ul>
            {{ $questions->withQueryString()->links() }}
        </div>


    </div>
</div>
@endsection

@section('footer')
<script src="{{ asset('js/admin5.js') }}"></script>
@endsection

