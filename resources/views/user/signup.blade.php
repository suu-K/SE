@extends('layout')

@section('content')

        <form autocomplete="off" action="signup" accept-charset="utf-8" class="sign_up" name="sign_up" method="post">
            @csrf
            <input type="text" id="name" name="name" placeholder="닉네임" onfocus="this.placeholder=''" onblur="this.placeholder='닉네임'">
            <input type="email" id="email" name="email" placeholder="아이디" onfocus="this.placeholder=''" onblur="this.placeholder='아이디'">
            <input type="password" id="pw" name="pw" placeholder="비밀번호" onfocus="this.placeholder=''" onblur="this.placeholder='비밀번호'">
            <input type="password" id="confirm_pw" name="confirm_pw" placeholder="비밀번호 확인" onfocus="this.placeholder=''" onblur="this.placeholder='비밀번호 확인'">

            <div id="address">
                    <div id="search_ad">
                    <input type="text" name="" class="postcodify_postcode5" value="" />
                    <button type="button" id="postcodify_search_button">검색</button>
                </div>
                <input type="text" name="" class="postcodify_address" value="" />
                <input type="text" name="" class="postcodify_details" value="" />
                <input type="text" name="" class="postcodify_extra_info" value="" />
                <script> $(function() { $("#postcodify_search_button").postcodifyPopUp(); }); </script>
            </div>
            <input type="text" name="phone" class="phone" maxlength="13" placeholder="전화번호" onfocus="this.placeholder=''" onblur="this.placeholder='전화번호'">
            <script> $(function() { $('.phone').keydown(); }); </script>
            <input type="date" id="birth" name="birth" placeholder="생년월일" onfocus="this.placeholder=''" onblur="this.placeholder='생년월일'">


            <button type="submit" value="submit">회원가입</button>


        </form>


  @endsection
