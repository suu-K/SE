function fnCalCount(type, ths){
    var $input = $(ths).parents("div").find("input[name='amount']");
    var tCount = Number($input.val());

    if(type=='p'){
        if(tCount) $input.val(Number(tCount)+1);

    }else{
        if(tCount >1) $input.val(Number(tCount)-1);
        }
}

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
                document.getElementById("extraAddress").value = extraAddr;

            } else {
                document.getElementById("extraAddress").value = '';
            }

            // 우편번호와 주소 정보를 해당 필드에 넣는다.
            document.getElementById('postcode').value = data.zonecode;
            document.getElementById("address").value = addr;
            // 커서를 상세주소 필드로 이동한다.
            document.getElementById("detailAddress").focus();
        }
    }).open();
}

$('#addressTab > div > ul > li').click(function() {
    // 클릭된 당사자 => this
    // 이 함수를 실행한 주어 => this
    // $(this) => 이거 포장해주세요.
    // 굳이 포장을 하는 이유
    let $클릭된_녀석 = $(this);

    let $addressTab = $클릭된_녀석.closest('#addressTab');
    //var $part5 = $클릭된_녀석.parent().parent().parent(); // $part5를 얻는 또 다른 방법
    // 오직 $part5 안에서만 .body 로 검색해서 나온 것들 포장해주세요.
    let $tog = $addressTab.find('div').find('.tog');

    // 클릭된 녀석이 형제 중에서 몇 번째 인지 확인(참고로 0부터 셉니다.);
    let index = $클릭된_녀석.index();

    // part-5 라는 클래스를 가진 나의 조상중에 나랑 가장 가까운 1개를 포장해주세요.

    // 기존의 active 된 요소들에서 active 제거
    $tog.find('.active').removeClass('active');

    $tog.find('ul:nth-child(' + (index + 1) + ')').addClass('active');
});

function showPopup() {
    window.open("/address", "a", "width=520, height=500, left=100, top=50");
}





let slideWrapper = document.querySelector('#pro_image');
    let slides = document.querySelectorAll('.picture');
    let totalSlides = slides.length; // item의 갯수


    let sliderWidth = slideWrapper.clientWidth; // container의 width
    let slideIndex = 0;
    let slider = document.querySelector('.slider');

    slider.style.width = sliderWidth * totalSlides + 'px';

showSlides()

function showSlides() {

    for(let i=0;i<slides.length;i++){
        slider.style.left = -(sliderWidth * slideIndex) + 'px';
    }
    slideIndex++;
    if (slideIndex === totalSlides) {
        slideIndex = 0;
    }
    setTimeout(showSlides, 4000);
}


function slideNext(){
    let nextEvent = document.getElementsByClassName('.next')
    nextEvent.addEventListener('click', function(){
        slider.style.left = -(sliderWidth * slideIndex) + 'px';
        slideIndex++;
    });
}
