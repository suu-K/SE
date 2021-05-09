@extends('layout')

@section('header')
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/signup.css') }}"/>
@endsection

@section('content')

        <form autocomplete="off" action="{{ route('register') }}" accept-charset="utf-8" class="sign_up" name="sign_up" method="post">
            @csrf
            <div>
                닉네임<br><input type="text" id="name" name="name" placeholder="닉네임" onfocus="this.placeholder=''" onblur="this.placeholder='닉네임'">
            </div>
            <div>
                아이디<br><input type="email" id="email" name="email" placeholder="아이디" onfocus="this.placeholder=''" onblur="this.placeholder='아이디'">
            </div>
            <div>
                비밀번호<br><input type="password" id="pw" name="password" placeholder="비밀번호" onfocus="this.placeholder=''" onblur="this.placeholder='비밀번호'">
            </div>
            <div>
                비밀번호 확인<br><input type="password" id="confirm_pw" name="password_confirmation" placeholder="비밀번호 확인" onfocus="this.placeholder=''" onblur="this.placeholder='비밀번호 확인'">
            </div>

            <div>
                전화번호<br>
                <input type="text" name="phone" class="phone" maxlength="13" placeholder="전화번호" onfocus="this.placeholder=''" onblur="this.placeholder='전화번호'">
            </div>
            <div>
                생년월일<br>
                <input type="date" id="birth" name="birth" placeholder="생년월일" onfocus="this.placeholder=''" onblur="this.placeholder='생년월일'">
            </div>

            <button type="submit" id="sign_btn" value="submit">회원가입</button>


        </br>
    </form>
  @endsection
