@extends('admin.layout')

@section('header')
    <link href="{{ asset('css/event.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="all">
        <nav class="details">
            <form class="regist" action="#" method="POST">
                <div>
                    <input type=file name="imageUpload" accept="image/*" id="imageUpload">
                    <input type="text" name="eventName" id="eventName" value="">
                    <input type="text" name="inform" id="inform" value="">
                    <input type="date" name="start" id="start" value=""> ~ <input type="date" name="end" id="end" value="">
                    <button type="submit">등록</button>

                </div>
            </form>
            <form action="#" method="POST">
                <button type="submit" id="mod">수정</button>
                <ul class="list">
                    <li class="attribute"><p6 id="img">이미지</p6> <p6 id="title">제목</p6> <p6 id="more">세부정보</p6> <p6 id="range">유효기간</p6></li>
                    <li>
                        <input type="checkbox" id="product1">
                        <input type=file name="imageUpload" accept="image/*" class="product1" id="imageUpload"disabled/>
                        <input type="text" name="eventName" class="product1" id="eventName" value="" disabled/>
                        <input type="text" name="inform" class="product1" id="inform" value="" disabled/>
                        <input type="date" name="start" class="product1" id="start" value="" disabled/> ~ <input type="date" name="end" class="product1" id="end" value="" disabled/>
                    </li>
                    <li>
                        <input type="checkbox" id="product2">
                        <input type=file name="imageUpload" accept="image/*" class="product2" id="imageUpload"disabled/>
                        <input type="text" name="eventName" class="product2" id="eventName" value="" disabled/>
                        <input type="text" name="inform" class="product2" id="inform" value="" disabled/>
                        <input type="date" name="start" class="product2" id="start" value="" disabled/> ~ <input type="date" name="end" class="product2" id="end" value="" disabled/>
                    </li>
                    <li>
                        <input type="checkbox" id="product3">
                        <input type=file name="imageUpload" accept="image/*" class="product3" id="imageUpload"disabled/>
                        <input type="text" name="eventName" class="product3" id="eventName" value="" disabled/>
                        <input type="text" name="inform" class="product3" id="inform" value="" disabled/>
                        <input type="date" name="start" class="product3" id="start" value="" disabled/> ~ <input type="date" name="end" class="product3" id="end" value="" disabled/>
                    </li>
                    <li>
                        <input type="checkbox" id="product4">
                        <input type=file name="imageUpload" accept="image/*" class="product4" id="imageUpload"disabled/>
                        <input type="text" name="eventName" class="product4" id="eventName" value="" disabled/>
                        <input type="text" name="inform" class="product4" id="inform" value="" disabled/>
                        <input type="date" name="start" class="product4" id="start" value="" disabled/> ~ <input type="date" name="end" class="product4" id="end" value="" disabled/>
                    </li>
                    <li><nav id="paging"></nav></li>
                </ul>
            </form>
        </nav>
    </div>
@endsection

@section('footer')
    <script src="{{ asset('js/event.js') }}"></script>
@endsection
