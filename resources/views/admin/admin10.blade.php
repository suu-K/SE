@extends('layout')

@section('header')
<link href="{{ asset('css/admin10.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<form autocomplete="off" action="#" accept-charset="utf-8" class="question" name="question" method="POST">
    <div class="quest">
        <h2>일정가 이상 시 할인 쿠폰 등록</h2>
        <div class="day">
            유효기간(~까지)<br>
            <input class="date" type="date" id="" name="" required>
        </div>
        <div class="cate">
            카테고리<br>
            <select class="select" name="" required>
                <option selected="selected" value="" disabled>선택</option>
                <option value="PlayStation5">PlayStation5</option>
                <option value="PlayStation4">PlayStation4</option>
                <option value="PlayStationVR">PlayStationVR</option>
                <option value="PlayStation3">PlayStation3</option>
                <option value="닌텐도Switch">닌텐도Switch</option>
                <option value="닌텐도3DS">닌텐도3DS</option>
            </select>
        </div>

        <div class="buy">
            할인퍼센트<br>
            <input class="text" type="number" pattern="[0-9]+" oninvalid="alert('할인퍼센트: 숫자(양수)만 입력하세요');" min="1" id="" name="" placeholder="%" onfocus="this.placeholder=''" onblur="this.placeholder='%'" required>
        </div>
        <div class="require">
            최대 할인가<br>
            <input class="text" type="number" pattern="[0-9]+" oninvalid="alert('최대 할인가: 숫자(양수)만 입력하세요');" min="1" id="" name="" placeholder="원" onfocus="this.placeholder=''" onblur="this.placeholder='원'" required>
        </div>
    </div>
    <div class="button">
        <input type="hidden" value="1">
        <button type="submit" formaction="/coupon/insert">등록</button>
        <button type="submit" formaction="/admin8">취소</button>
    </div>
</form>
@endsection

@section('footer')
<script async src="{{ asset('js/admin10.js') }}"></script>
@endsection
