<html lang="en">
<head>
    <link href="{{ asset('css/address.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <title>Document</title>
</head>
<body>
    <nav id="introduce">
        배송지 목록
        <button type="button" class="regist">신규 등록</button>
    </nav>

    <!--배송지 등록 부분-->
    <form class="modify" id="newinfo" method="POST">
        @csrf
        <div class="moddiv">
            <div>수정하기 x</div>
            <div>배송지<input type="text" name="destination" class="destination" required></div>
            <div>
                주소
                <ul class="add" id="newinfo">
                    <li>
                        <input type="text" id="postcode" name="postcode" placeholder="우편번호" autocomplete="off" required>
                        <button class="address_button" name="address_button" type="button" onclick="execDaumPostcode()">주소 찾기</button>
                    </li>
                    <li><input type="text" id="modifyAddress" name="address" placeholder="주소" autocomplete="off" required><br></li>
                    <li>
                        <input type="text" id="detailAddress" name="detailAddress" placeholder="상세주소" autocomplete="off" required>
                        <input type="text" id="extraAddress" name="extraAddress" placeholder="참고항목" autocomplete="off" required>
                    </li>
                </ul>
            </div>
            <div>연락처  <input type="text" pattern="[0-9]{11,11}$" name="phone" id="phoneNo" placeholder="전화번호" onfocus="this.placeholder=''" onblur="this.placeholder='전화번호'" title="-없이 숫자 11자리를 입력하세요." required></div>
            <div>
                기본배송지 설정
                <ul id="selectAdd">
                    <li><label><input type="radio" name="default" value="true" id="first">Yes</label></li>
                    <li><label><input type="radio" name="default" value="false" id="second" checked>No</label></li>
                </ul>
            </div>
            <div class="submitbtn"><button type="submit" class="subbtn" name="subbtn" formaction="/address/insert">등록</button></div>
        </div>
    </form>
    <ul id="list">
        <li>
            <ul class="infoName">
                <li class="name">배송지</li>
                <li class="phoneNum">연락처</li>
                <li class="address" id="address">주소</li>
                <li class="controll">관리</li>
            </ul>
        </li>

        <!--배송지 들어가는 부분 시작-->
        @if($addresses != null)
        @foreach($addresses as $address)
        <li>
            <form method="POST" onsubmit="return confirm('정말 삭제하시겠습니까?')">
                @csrf
                <div class="infoForm">
                    <ul class="info">
                        <li class="name">{{ $address->destination }}</li>
                        <li class="phoneNum">{{ $address->phone }}</li>
                        <li class="address">({{ $address->postcode }}) {{ $address->address }} {{ $address->detailAddress }} {{ $address->extraAddress }}</li>
                    </ul>
                    <ul class="but">
                        <input type="hidden" name="id" value="{{ $address->id }}">
                        <li><button type="button" class="modBtn" name="modBtn">수정</button></li>
                        <li><button type="submit" formaction="/address/delete" name="del">삭제</button></li>
                    </ul>
                </div>
            </form>
            <form class="modify" method="POST">
                @csrf
                <div class="moddiv">
                    <div>수정하기 x</div>
                    <div id="des">배송지<input type="text" class="destination" name="destination" value="{{ $address->destination }}" autocomplete="off" required></div>
                    <div class="addr">
                        주소
                        <ul class="add">
                            <li id="post">
                                <input type="text" id="postcode{{ $loop->iteration }}" name="postcode" placeholder="우편번호" value="{{ $address->postcode }}" autocomplete="off" required>
                                <button class="address_button" name="address_button" type="button" onclick="execDaumPostcode{{ $loop->iteration }}()">주소 찾기</button></li>
                            <li id="modadd"><input type="text" id="modifyAddress{{ $loop->iteration }}" name="address" placeholder="주소" value="{{ $address->address }}" autocomplete="off" required><br></li>
                            <li id="plusadd">
                                <input type="text" id="detailAddress{{ $loop->iteration }}" name="detailAddress" placeholder="상세주소" value="{{ $address->detailAddress }}" autocomplete="off" required>
                                <input type="text" id="extraAddress{{ $loop->iteration }}" name="extraAddress" placeholder="참고항목" value="{{ $address->extraAddress }}" autocomplete="off" required>                                </li>
                        </ul>
                    </div>
                    <div id="tell">연락처  <input type="text" pattern="[0-9]{11,11}$" name="phone" id="phoneNo" value="{{ $address->phone }}" placeholder="전화번호" onfocus="this.placeholder=''" onblur="this.placeholder='전화번호'" title="-없이 숫자 11자리를 입력하세요." required></div>
                    <div>
                        기본배송지 설정
                        <ul id="selectAdd">
                            <li><label><input type="radio" name="default" value="true" id="first" @if($address->def == true) checked @endif>Yes</label></li>
                            <li><label><input type="radio" name="default" value="false" id="second" @if($address->def == false) checked @endif>No</label></li>
                        </ul>
                    </div>
                    <input type="hidden" name="id" value="{{ $address->id }}">
                    <div class="submitbtn"><button type="submit" class="subbtn" formaction="/address/update" name="subbtn">확인</button></div>
                </div>
            </form>
        </li>
        @endforeach
        @endif
    </ul>

</body>

<script src="{{ asset('js/address.js') }}"></script>

<!--서버에서 이거 for each문 돌려주세요 돌리고 주석 지워주세요-->
<!--1이 신규등록이고 2부터가 저장된 데이터-->
<script>
    function execDaumPostcode() {
    new daum.Postcode({
        oncomplete: function(data) {
          var addr = ''; // 주소 변수
            var extraAddr = ''; // 참고항목 변수
          if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                addr = data.roadAddress;
            } else { // 사용자가 지번 주소를 선택했을 경우(J)
                addr = data.jibunAddress;
            }
            if(data.userSelectedType === 'R'){
                if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
                    extraAddr += data.bname;
                }
                if(data.buildingName !== '' && data.apartment === 'Y'){
                    extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                }
                if(extraAddr !== ''){
                    extraAddr = ' (' + extraAddr + ')';
                }
                document.getElementById("extraAddress").value = extraAddr;

            } else {
                document.getElementById("extraAddress").value = '';
            }

            document.getElementById('postcode').value = data.zonecode;
            document.getElementById("modifyAddress").value = addr;
            document.getElementById("detailAddress").value = null;
            document.getElementById("detailAddress").focus();
        }
    }).open();
    }
    @if($addresses != null)
    @foreach($addresses as $address)
    function execDaumPostcode{{ $loop->iteration }}() {
    new daum.Postcode({
        oncomplete: function(data) {
          var addr = ''; // 주소 변수
            var extraAddr = ''; // 참고항목 변수
          if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                addr = data.roadAddress;
            } else { // 사용자가 지번 주소를 선택했을 경우(J)
                addr = data.jibunAddress;
            }
            if(data.userSelectedType === 'R'){
                if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
                    extraAddr += data.bname;
                }
                if(data.buildingName !== '' && data.apartment === 'Y'){
                    extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                }
                if(extraAddr !== ''){
                    extraAddr = ' (' + extraAddr + ')';
                }
                document.getElementById("extraAddress{{ $loop->iteration }}").value = extraAddr;

            } else {
                document.getElementById("extraAddress{{ $loop->iteration }}").value = '';
            }

            document.getElementById('postcode{{ $loop->iteration }}').value = data.zonecode;
            document.getElementById("modifyAddress{{ $loop->iteration }}").value = addr;
            document.getElementById("detailAddress{{ $loop->iteration }}").value = null;
            document.getElementById("detailAddress{{ $loop->iteration }}").focus();
        }
    }).open();
    }

    @endforeach
    @endif
</script>
</html>
