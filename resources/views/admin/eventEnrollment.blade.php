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
            <form action="/event/update" method="POST" enctype="multipart/form-data">
                @csrf
                <button type="submit" id="mod" formaction="/event/update">수정</button>
                <ul class="list">
                    <li class="attribute"><p6 id="img">이미지</p6> <p6 id="title">제목</p6> <p6 id="more">세부정보</p6> <p6 id="range">유효기간</p6></li>

                    @foreach($events as $event)
                    <li>
                        <input type="checkbox" id="product{{ $loop->iteration }}" name="id[]" value="{{ $event->id }}">
                        <input type=file name="image[]" accept="image/*" class="product{{ $loop->iteration }}" id="imageUpload" disabled/>
                        <input type="text" name="title[]" class="product{{ $loop->iteration }}" id="eventName" value="{{ $event->title }}" disabled/>
                        <input type="text" name="body[]" class="product{{ $loop->iteration }}" id="inform" value="{{ $event->body }}" disabled/>
                        <input type="date" name="sdate[]" value="{{ $event->sdate }}" class="product{{ $loop->iteration }}" id="start" disabled/> ~ <input type="date" name="ldate[]" value="{{ $event->ldate }}" class="product{{ $loop->iteration }}" id="end" disabled/>
                    </li>
                    @endforeach
                    {{ $events->withQueryString()->links() }}
                </ul>
            </form>
        </nav>
    </div>
@endsection

@section('footer')
    <script src="{{ asset('js/event.js') }}"></script>
@endsection
