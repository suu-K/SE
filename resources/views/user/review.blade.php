<!DOCTYPE html>
<html lang="en">
<head>
    <link href="{{asset('css/review.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <title>Document</title>
</head>
<body>
    <form id="review" onsubmit="return inputCheck();" action="/reviewInsert/{{ $id }}" method="POST">
        @csrf
        <input type="hidden" value="{{ $product_id }}" name="product_id">
        <ul>
            <li>
                <ul class="evaluation">
                    <li>
                        추천
                    </li>
                    <li id="recommendation">
                        <label><input type="radio" name="recommend" value="3">적극추천</label>
                        <label><input type="radio" name="recommend" value="2">추천</label>
                        <label><input type="radio" name="recommend" value="1">비추천</label>
                    </li>
                </ul>
            </li>
            <li>
                <ul class="evaluation">
                    <li>
                        배송평가
                    </li>
                    <li id="speed">
                        <label><input type="radio" name="speed" value="3">빠름</label>
                        <label><input type="radio" name="speed" value="2">보통</label>
                        <label><input type="radio" name="speed" value="1">느림</label>
                    </li>
                </ul>
            </li>
            <li>
                <ul class="evaluation">
                    <li>
                        점수
                    </li>
                    <li id="score">
                        <label><input type="radio" name="rating" value="5">5</label>
                        <label><input type="radio" name="rating" value="4">4</label>
                        <label><input type="radio" name="rating" value="3">3</label>
                        <label><input type="radio" name="rating" value="2">2</label>
                        <label><input type="radio" name="rating" value="1">1</label>
                    </li>
                </ul>
            </li>
            <li>
                <ul class="evaluation">
                    <li>
                        후기
                    </li>
                    <li>
                        <textarea placeholder="후기를 입력해주세요." name="evaluation"></textarea>
                        <div id="test_cnt">(0 / 100)</div>
                    </li>
                </ul>
            </li>
            <li><button type="submit">제출</button></li>
        </ul>
    </form>
</body>

<script src="{{ asset('js/review.js') }}"></script>

</html>
