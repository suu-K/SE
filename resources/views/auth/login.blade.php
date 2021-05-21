@extends('layout')

@section('header')
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/login.css') }}"/>
@endsection

@section('content')
        <form autocomplete="off" action="login" accept-charset="utf-8" class="log_in" name="log_in" method="post">
            @csrf
            <input type="email" id="email" name="email" placeholder="아이디" onfocus="this.placeholder=''" onblur="this.placeholder='아이디'">
            <input type="password" id="pw" name="password" placeholder="비밀번호" onfocus="this.placeholder=''" onblur="this.placeholder='비밀번호'">
            <button type="submit" value="submit">로그인</button>
            <ul id="addition">
                <li><a href="{{route('register')}}">회원가입</a></li>
                <li><a href="{{route('password.request')}}">비밀번호 찾기</a></li>
            </ul>
        </form>


@endsection

@section('footer')

@endsection
