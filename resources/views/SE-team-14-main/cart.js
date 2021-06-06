function fnCalCount(type, ths){
    var $input = $(ths).parents("div").find("input[name='amount']");
    var tCount = Number($input.val());
    
    if(type=='p'){
        if(tCount) $input.val(Number(tCount)+1);
        
    }else{
        if(tCount >1) $input.val(Number(tCount)-1);    
        }
}

function sum()  {
    const name = document.getElementById('num').value;
    const price = $("#price").text();
    document.getElementById("price1").innerHTML = (name * price);
    this.price();
  }

  function sum1()  {
    const name1 = document.getElementById('num1').value;
    const price1 = $("#price2").text();
    document.getElementById("price3").innerHTML = (name1 * price1);
    this.price();
  }

  function captureReturnKey(e) {
      if(e.keyCode==13 && SVGCircleElement.type != 'textarea')
      return false;
  }

  function price() {
    const pr1 = $("#price1").text();
    const pr2 = $("#price3").text();
    var sum = 0;
    sum += pr1*1;
    sum += pr2*1;
    document.getElementById('sum_price').innerHTML = sum;
  }