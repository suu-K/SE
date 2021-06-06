@extends('layout')

@section('header')
<link href="{{ asset('css/admin9.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<form autocomplete="off" action="#" accept-charset="utf-8" class="question" name="question" method="POST">
    <div class="quest">
        <h2>일정가 이상 시 할인 쿠폰 등록</h2>
        <div class="day">
            유효기간(~까지)<br>
            <input class="date" type="date" id="" name="" required>
        </div>
        <div class="buy">
            할인가격<br>
            <input class="text" type="number" pattern="[0-9]+" oninvalid="alert('할인가격: 숫자(양수)만 입력하세요');" min="1" id="" name="" placeholder="원" onfocus="this.placeholder=''" onblur="this.placeholder='원'" required>
        </div>
        <div class="require">
            조건 금액<br>
            <input class="text" type="number" pattern="[0-9]+" oninvalid="alert('조건 금액: 숫자(양수)만 입력하세요');" min="1" id="" name="" placeholder="원" onfocus="this.placeholder=''" onblur="this.placeholder='원'" required>
        </div>
    </div>
    <div class="button">
        <input type="hidden" value="0">
        <button type="submit" formaction="/coupon/insert">등록</button>
        <button type="submit" formaction="/admin7">취소</button>
    </div>
</form>
@endsection

@section('footer')
<script async src="{{ asset('js/admin9.js') }}"></script>
@endsection
