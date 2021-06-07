@extends('layout')

@section('header')
    <link href="{{ asset('css/eventSebu.css') }}" rel="stylesheet" type="text/css" />
@endsection


@section('content')
    <div id="eventInfo">
        <div id="img">
            <img src="{{ url("storage/$event->image") }}"></img>
        </div>
        <div id="info">
            <form method="POST">
                <button formaction="" disabled>쿠폰 다운받기</button>
            </form>
            <p>{{ $event->title }}</p>
            <p>{{ $event->body }}</p>
        </div>
    </div>
@endsection

@section('footer')
    <script src="{{ asset('js/eventSebu.js') }}"></script>
@endsection
