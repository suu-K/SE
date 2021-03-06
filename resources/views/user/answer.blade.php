<!DOCTYPE html>
<html>
<head>
    <link href="{{ asset('css/answer.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <title>Document</title>
</head>
<body>
    <form autocomplete="off" method="POST">
        @csrf
        주문 상품<br>
        <div>
            {{ $product->name }}
        </div>
        문의 제목<br>
        <div>
            {{ $question->title}}
        </div>
        문의 내용<br>
        <div>
            {{ $question->body}}
        </div>
        답변<br>
        <div>
            <textarea name="answer"></textarea>
        </div>
        <input type="hidden" name="id" value="{{ $question->id }}">
        <div class="button">
            <button formaction="/answerInsert">등록</button><!--여기서 등록 버튼 누르면 관리자 화면에서 답변하기 버튼이 답변 완료 버튼으로 수정 돼야 돼용-->
            <button formaction="">취소</button>
        </div>
    </form>
</body>
</html>
