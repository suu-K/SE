<!DOCTYPE html>
<html>
<head>
    <link href="{{ asset('css/questcontent.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <title>Document</title>
</head>
<body>
    주문 상품
    <div class="name">
        {{ $product->name}}
    </div>
    문의 제목
    <div class="title">
        {{$question->title}}
    </div>
    문의 내용
    <div class="content">
        {{$question->body}}
    </div>
    답변 내용
    <div class="answer">
        @if($question->answer == null)
        아직 답변이 없습니다.
        @else
        {{$question->answer}}
        @endif
    </div>
</body>
</html>
