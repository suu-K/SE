function inputCheck(){
    if ( $('#recommendation').find('[name=recommend]:checked').length < 1 ) {
        alert("추천여부를 선택하세요.");
        return false;
   }
   if ( $('#speed').find('[name=speed]:checked').length < 1 ) {
       alert("배송평가를 선택하세요.");
       return false;
  }
  if ( $('#score').find('[name=rating]:checked').length < 1 ) {
      alert("점수를 선택하세요.");
      return false;
 }
 if($('textarea').val() == 0){
     alert("후기를 입력하세요.");
    return false;
 }
 if($('textarea').val().length > 100){
     alert("100자 이하로 작성하세요.")
     return false;
 }
}
$(document).ready(function() {
    $('textarea').on('keyup', function() {
        $('#test_cnt').html("("+$(this).val().length+" / 100)");
    });
});
