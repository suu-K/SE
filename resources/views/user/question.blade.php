@extends('layout')

@section('header')
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/question.css') }}"/>
@endsection

@section('content')
<form autocomplete="off" action="/questionInsert" accept-charset="utf-8" class="question" name="question" method="POST">
    @csrf
        <input type="hidden" name="order_product_id" value="{{ $id }}">
        <div class="quest">
            <h2>문의하기</h2>
            <div class="cate">
                종류<br>
                <input type="radio" name="category" value="상품" checked> 상품
                <input type="radio" name="category" value="배송"> 배송
                <input type="radio" name="category" value="반품/취소"> 반품/취소
                <input type="radio" name="category" value="기타"> 기타
            </div>
            <div class="title">
                제목<br>
                <input type="text" class="text" name="title">
            </div>
            <div class="content">
                내용<br>
                <textarea name="body"></textarea>
            </div>
        </div>
        <div class="button">
            <button type="submit">등록</button>
            <button type="submit">취소</button>
        </div>
    </form>
@endsection

@section('footer')
    <script async src="{{ asset('js/question.js') }}"></script>
@endsection
