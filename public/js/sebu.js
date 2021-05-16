function fnCalCount(type, ths){
    var $input = $(ths).parents("div").find("input[name='amount']");
    var tCount = Number($input.val());
    
    if(type=='p'){
        if(tCount) $input.val(Number(tCount)+1);
        
    }else{
        if(tCount >1) $input.val(Number(tCount)-1);    
        }
}