
/*삭제버튼 클릭시 물어보고 선택에따라 확인이면 다시 address.html로 돌아가고
    취소면 삭제누르기 전으로 돌아감*/


$(".regist").click(function(){
    $(this).parent().parent().find("#newinfo").toggle();
});
$(".modBtn").click(function(){

    $(this).parent().parent().parent().parent().parent().find('.modify').toggle();
});


$(".info").click(function(){
        window.opener.document.getElementById("destination").value = $(this).closest('.infoLi').find('.modify').find('.moddiv').find('#des').find('input').val();
        window.opener.document.getElementById("postcode").value = $(this).closest('.infoLi').find('.modify').find('.moddiv').find('.addr').find('.add').find('#post').find('input').val();
        window.opener.document.getElementById("address").value = $(this).closest('.infoLi').find('.modify').find('.moddiv').find('.addr').find('.add').find('#modadd').find('input').val();
        window.opener.document.getElementById("detailAddress").value = $(this).closest('.infoLi').find('.modify').find('.moddiv').find('.addr').find('.add').find('#plusadd').find('input:eq(0)').val();
        window.opener.document.getElementById("extraAddress").value = $(this).closest('.infoLi').find('.modify').find('.moddiv').find('.addr').find('.add').find('#plusadd').find('input:eq(1)').val();
        window.opener.document.getElementById("phoneNo").value = $(this).closest('.infoLi').find('.modify').find('.moddiv').find('#tell').find('input').val();
        window.close(); 
        window.opener.document.getElementById('new').click();
});