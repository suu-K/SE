

$(function() {
  $("#alert_success").hide();
  $("#alert_danger").hide();
  $("input").keyup(function(){
      var pwd1=$("#pw").val();
      var pwd2=$("#confirm_pw").val();
      if(pwd1 != "" || pwd2 != ""){
          if(pwd2 !=""){
              if(pwd1 == pwd2){
              $("#alert_success").show();
              $("#alert_danger").hide();
              $("#sign_btn").removeAttr("disabled");
          }else{
              $("#alert_success").hide();
              $("#alert_danger").show();
              $("#sign_btn").attr("disabled", "disabled");
          }
      }
          }
  })
})
