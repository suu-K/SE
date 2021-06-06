@extends('layout')

@section('header')
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/questlist.css') }}"/>
@endsection

@section('content')
<div>
            <div class="prod">
                <div id="product">
                    <!-- 문의 확인 내역 쪽 head -->
                    <div id="head_day">
                        등록일시
                    </div>
                    <div id="head_quest_category">
                        문의 종류
                    </div>
                    <div id="head_title">
                        문의 제목
                    </div>
                    <div id="head_answer">
                        답변
                    </div>
                    <div id="head_sebu">
                        상세
                    </div>
                    <div id="head_add">
                        추가 문의
                    </div>

                    <!-- 여기서부터 문의 확인  -->
                    @foreach($questions as $question)
                    <form>
                        <div id="day">
                        {{ $question->created_at }}
                    </div>
                    <div id="quest_cate">{{ $question->category }}</div>
                    <div id="title">{{ $question->title }}</div>
                    <div id="answer">
                        @if($question->answer == null)
                        미응답
                        @else
                        응답완료
                        @endif
                    </div>
                    <div id="sebu">
                        <button type="button" onclick="window.open('/questcontent/{{ $question->id }}', 'a', 'width=520, height=500, left=100, top=50');">보기</button>
                    </div>
                    <div id="add">
                        <button type="submit" formaction="/question/{{ $question->order_list_id }}">문의하기</button>
                    </div></form>
                    @endforeach
                </div>
            </div>
    </div>
@endsection

@section('footer')
    <script async src="{{ asset('js/questlist.js') }}"></script>
    <script>
    $('input[type="text"]').keydown(function() {
        if (event.keyCode === 13) {
          event.preventDefault();
        };
      });
    </script>
@endsection
