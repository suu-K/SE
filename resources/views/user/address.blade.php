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
    <form class="modify" id="newinfo">
        <div class="moddiv">
            <div>수정하기 x</div>
            <div>배송지<input type="text" class="destination"></div>
            <div>
                주소
                <ul class="add" id="newinfo">
                    <li>
                        <input type="text" id="postcode1" name="postcode" placeholder="우편번호" autocomplete="off">
                        <button class="address_button" name="address_button" type="button" onclick="execDaumPostcode()">주소 찾기</button>
                    </li>
                    <li><input type="text" id="modifyAddress1" name="modifyAddress" placeholder="주소" autocomplete="off"><br></li>
                    <li>
                        <input type="text" id="detailAddress1" name="detailAddress" placeholder="상세주소" autocomplete="off">
                        <input type="text" id="extraAddress1" name="extraAddress" placeholder="참고항목" autocomplete="off">
                    </li>
                </ul>
            </div>
            <div>연락처  <input type="text" pattern="[0-9]{11,11}$" name="phoneNo" id="phoneNo" placeholder="전화번호" onfocus="this.placeholder=''" onblur="this.placeholder='전화번호'" title="-없이 숫자 11자리를 입력하세요." required></div>
            <div class="submitbtn"><button type="submit" class="subbtn" name="subbtn" formaction="#">확인</button></div>
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
        <li>
            <form method="POST">
                <div class="infoForm">
                    <ul class="info">
                        <li class="name">배송지</li>
                        <li class="phoneNum">연락처</li>
                        <li class="address">주소</li>
                    </ul>
                    <ul class="but">
                        <li><button type="button" class="modBtn" name="modBtn">수정</button></li>
                        <li><button type="button" onclick="deletebtn()" formaction="#" name="del">삭제</button></li>
                    </ul>
                </div>
                <div class="modify">
                    <div class="moddiv">
                        <div>수정하기 x</div>
                        <div id="des">배송지<input type="text" class="destination" name="destination" value="집" autocomplete="off"></div>
                        <div class="addr">
                            주소
                            <ul class="add">
                                <li id="post">
                                    <input type="text" id="postcode2" name="postcode" placeholder="우편번호" value="12345" autocomplete="off">
                                    <button class="address_button" name="address_button" type="button" onclick="execDaumPostcode()">주소 찾기</button>
                                </li>
                                <li id="modadd"><input type="text" id="modifyAddress2" name="modifyAddress" placeholder="주소" value="111" autocomplete="off"><br></li>
                                <li id="plusadd">
                                    <input type="text" id="detailAddress2" name="detailAddress" placeholder="상세주소" value="222" autocomplete="off">
                                    <input type="text" id="extraAddress2" name="extraAddress" placeholder="참고항목" value="333" autocomplete="off">
                                </li>
                            </ul>
                        </div>
                        <div id="tell">연락처 <input type="text" pattern="[0-9]{11,11}$" name="phoneNo" id="phoneNo" value="01041659853" placeholder="전화번호" onfocus="this.placeholder=''" onblur="this.placeholder='전화번호'" title="-없이 숫자 11자리를 입력하세요." required></div>
                        <div class="submitbtn"><button type="submit" class="subbtn" formaction="##" name="subbtn">확인</button></div>
                    </div>
                </div>
            </form>
        </li>

        <li>
            <form method="POST">
                <div class="infoForm">
                    <ul class="info">
                        <li class="name">배송지</li>
                        <li class="phoneNum">연락처</li>
                        <li class="address">주소</li>
                    </ul>
                    <ul class="but">
                        <li><button type="button" class="modBtn" name="modBtn">수정</button></li>
                        <li><button type="button" onclick="deletebtn()" formaction="#" name="del">삭제</button></li>
                    </ul>
                </div>
                <div class="modify">
                    <div class="moddiv">
                        <div>수정하기 x</div>
                        <div id="des">배송지<input type="text" class="destination" name="destination" value="기숙사" autocomplete="off"></div>
                        <div class="addr">
                            주소
                            <ul class="add">
                                <li id="post">
                                    <input type="text" id="postcode1" name="postcode" placeholder="우편번호" value="23456" autocomplete="off">
                                    <button class="address_button" name="address_button" type="button" onclick="execDaumPostcode()">주소 찾기</button>
                                </li>
                                <li id="modadd"><input type="text" id="modifyAddress1" name="modifyAddress" placeholder="주소" value="ddd" autocomplete="off"><br></li>
                                <li id="plusadd">
                                    <input type="text" id="detailAddress1" name="detailAddress" placeholder="상세주소" value="aaa" autocomplete="off">
                                    <input type="text" id="extraAddress1" name="extraAddress" placeholder="참고항목" value="bbb" autocomplete="off">
                                </li>
                            </ul>
                        </div>
                        <div id="tell">연락처  <input type="text" pattern="[0-9]{11,11}$" name="phoneNo" id="phoneNo" value="01041659853" placeholder="전화번호" onfocus="this.placeholder=''" onblur="this.placeholder='전화번호'" title="-없이 숫자 11자리를 입력하세요." required></div>
                        <div class="submitbtn"><button type="submit" class="subbtn" formaction="##" name="subbtn">확인</button></div>
                    </div>
                </div>
            </form>
        </li>
    </ul>

</body>

<script src="{{ asset('js/address.js') }}"></script>

<!--서버에서 이거 for each문 돌려주세요 돌리고 주석 지워주세요-->
<!--1이 신규등록이고 2부터가 저장된 데이터-->
<script>
    function execDaumPostcode() {
    new daum.Postcode({
        oncomplete: function(data) {
            // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

            // 각 주소의 노출 규칙에 따라 주소를 조합한다.
            // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
            var addr = ''; // 주소 변수
            var extraAddr = ''; // 참고항목 변수

            //사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
            if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                addr = data.roadAddress;
            } else { // 사용자가 지번 주소를 선택했을 경우(J)
                addr = data.jibunAddress;
            }

            // 사용자가 선택한 주소가 도로명 타입일때 참고항목을 조합한다.
            if(data.userSelectedType === 'R'){
                // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
                    extraAddr += data.bname;
                }
                // 건물명이 있고, 공동주택일 경우 추가한다.
                if(data.buildingName !== '' && data.apartment === 'Y'){
                    extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                }
                // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                if(extraAddr !== ''){
                    extraAddr = ' (' + extraAddr + ')';
                }
                // 조합된 참고항목을 해당 필드에 넣는다.
                document.getElementById("extraAddress1").value = extraAddr;

            } else {
                document.getElementById("extraAddress1").value = '';
            }

            // 우편번호와 주소 정보를 해당 필드에 넣는다.
            document.getElementById('postcode1').value = data.zonecode;
            document.getElementById("modifyAddress1").value = addr;
            // 커서를 상세주소 필드로 이동한다.
            document.getElementById("detailAddress1").focus();
        }
    }).open();
}

</script>
</html>
