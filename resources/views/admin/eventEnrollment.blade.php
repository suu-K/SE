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
            </form><br>

                <ul id="sort">
                    <li><a href="/admin/event">등록순</a></li>
                    <li><a href="/admin/event/asc">빠른순</a></li>
                    <li><a href="/admin/event/desc">느린순</a></li>
                </ul>
                <br>
                <ul class="list">
                    <li class="attribute"><p6 id="img">이미지</p6> <p6 id="title">제목</p6> <p6 id="more">세부정보</p6> <p6 id="range">유효기간</p6></li>

                    @foreach($events as $event)
                    <li>
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $event->id }}">
                            <input type=file name="image" accept="image/*" class="product{{ $loop->iteration }}" id="imageUpload"/>
                            <input type="text" name="title" class="product{{ $loop->iteration }}" id="eventName" value="{{ $event->title }}"/>
                            <input type="text" name="body" class="product{{ $loop->iteration }}" id="inform" value="{{ $event->body }}"/>
                            <input type="date" name="sdate" value="{{ date("Y-m-d", strtotime($event->sdate)) }}" class="product{{ $loop->iteration }}" id="start"/> ~ <input type="date" name="ldate" value="{{ date("Y-m-d", strtotime($event->ldate)) }}" class="product{{ $loop->iteration }}" id="end"/>
                            <button type="submit" class="mod" formaction="/event/update">수정</button>
                        </form>
                    </li>
                    @endforeach
                    {{ $events->withQueryString()->links() }}
                </ul>
        </nav>
    </div>
@endsection

@section('footer')
    <script src="{{ asset('js/event.js') }}"></script>
@endsection
