$("#sub").click(function(){
    let p = document.getElementById('p1').value;
    const realP = document.getElementById('p1').value; /*여기에 DB에서 진짜 비밀번호 value 받아와주세요*/

    if(p =! realP){
        alert('비밀번호가 일치하지 않습니다.');
        return false;
    }
    else{
        location.replace("mypage.html")
    }
});