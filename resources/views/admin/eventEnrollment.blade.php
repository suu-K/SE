@extends('layout')

@section('header')
    <link href="{{ asset('css/event.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="all">
        <nav class="details">
            <form class="regist" action="/event/insert" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <input type=file name="image" accept="image/*" id="imageUpload">
                    <input type="text" name="title" id="eventName">
                    <input type="text" name="body" id="inform">
                    <input type="date" name="sdate" id="start"> ~ <input type="date" name="ldate" id="end">
                    <button type="submit">등록</button>
                </div>
            </form>
            <form action="#" method="POST">
                <button type="submit" id="mod">수정</button>
                <ul class="list">
                    <li class="attribute"><p6 id="img">이미지</p6> <p6 id="title">제목</p6> <p6 id="more">세부정보</p6> <p6 id="range">유효기간</p6></li>

                    @foreach($events as $event)
                    <li>
                        <input type="checkbox" id="product{{ $loop->iteration }}" value="{{ $event->id }}">
                        <input type=file name="imageUpload" accept="image/*" class="product{{ $loop->iteration }}" id="imageUpload" disabled/>
                        <input type="text" name="eventName" class="product{{ $loop->iteration }}" id="eventName" value="{{ $event->title }}" disabled/>
                        <input type="text" name="inform" class="product{{ $loop->iteration }}" id="inform" value="{{ $event->body }}" disabled/>
                        <input type="date" name="start" class="product{{ $loop->iteration }}" id="start" value="{{ $event->sdate }}" disabled/> ~ <input type="date" name="end" class="product2" id="end" value="{{ $event->ldate }}" disabled/>
                    </li>
                    @endforeach
                    {{ $events->links() }}
                </ul>
            </form>
        </nav>
    </div>
@endsection

@section('footer')
    <script src="{{ asset('js/event.js') }}"></script>
@endsection
