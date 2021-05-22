@extends('layout')

@section('header')
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/signup.css') }}"/>
@endsection

@section('content')

        <form autocomplete="off" action="{{ route('register') }}" accept-charset="utf-8" class="sign_up" name="sign_up" method="post">
            @csrf
            <div>
                닉네임<br><input type="text" id="name" name="name" placeholder="닉네임" onfocus="this.placeholder=''" onblur="this.placeholder='닉네임'" required>
            </div>
            <div>
                아이디<br><input type="email" id="email" name="email" placeholder="아이디" onfocus="this.placeholder=''" onblur="this.placeholder='아이디'" required>
                <button type="button" id="check" onclick="id_check()">중복확인</button>
            <img id="id_check_sucess" style="display: none;">
            </div>
            <div>
                비밀번호<br><input type="password" class="password" id="pw" name="password" placeholder="비밀번호" onfocus="this.placeholder=''" onblur="this.placeholder='비밀번호'" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,16}$" title="소문자, 숫자, 특수문자 사용 8~16자리" required>
            </div>
            <div>
                비밀번호 확인<br><input type="password" class="password" id="confirm_pw" name="password_confirmation" placeholder="비밀번호 확인" onfocus="this.placeholder=''" onblur="this.placeholder='비밀번호 확인'" required>
                <div id="alert_success" style="color: blue;">비밀번호가 일치합니다.</div>
                <div id="alert_danger" style="color: #d92742;">비밀번호가 일치하지 않습니다.</div>
            </div>

            <div>
                전화번호<br>
                <input type="text" pattern="[0-9]{11,11}$" name="phone" class="phone" maxlength="13" placeholder="전화번호" onfocus="this.placeholder=''" onblur="this.placeholder='전화번호'" required>
            </div>
            <div>
                생년월일<br>
                <input type="date" id="birth" name="birth" placeholder="생년월일" onfocus="this.placeholder=''" onblur="this.placeholder='생년월일'" required>
            </div>

            <button type="submit" id="sign_btn" value="submit">회원가입</button>


        </br>
    </form>
@endsection

@section('footer')
    <script src="{{ asset('js/sign_up.js') }}"></script>
    <script>
    function id_check() {
    $('#email').change(function () {
        $('#id_check_sucess').hide();
        $('#check').show();
        $('#email').attr("check_result", "fail");
      })

      if ($('#email').val() == '') {
        alert('이메일을 입력해주세요.')
        return;
      }

      id_overlap_input = document.querySelector('input[name="email"]');

      $.ajax({
        url: '{{ route('check') }}',
        data: {
          'email': id_overlap_input.value
        },
        type:"GET",
        datatype: 'json',
        success: function (data) {
          console.log(data);
          if (data['result']) {
            alert("이미 존재하는 아이디 입니다.");
            id_overlap_input.focus();
            return;
          } else {
            alert("사용가능한 아이디 입니다.");
            $('#email').attr("check_result", "success");
            $('#id_check_sucess').show();
            $('#check').hide();
            return;
          }
        }
      });
    }
</script>
@endsection
