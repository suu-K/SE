$('.ctrMenu .tab > ul > li').click(function() {
    // 클릭된 당사자 => this
    // 이 함수를 실행한 주어 => this
    // $(this) => 이거 포장해주세요.
    // 굳이 포장을 하는 이유
    let $클릭된_녀석 = $(this);
    
    let $ctrMenu = $클릭된_녀석.closest('.ctrMenu');
    //var $part5 = $클릭된_녀석.parent().parent().parent(); // $part5를 얻는 또 다른 방법
    // 오직 $part5 안에서만 .body 로 검색해서 나온 것들 포장해주세요.
    let $ctr = $ctrMenu.find('.ctr');
    
    // 기존에 active 가진 녀석에게 active 빼앗기
    $클릭된_녀석.parent().find('.active').removeClass('active');
    $클릭된_녀석.addClass('active');
    
    // 클릭된 녀석이 형제 중에서 몇 번째 인지 확인(참고로 0부터 셉니다.);
    let index = $클릭된_녀석.index();
    
    // part-5 라는 클래스를 가진 나의 조상중에 나랑 가장 가까운 1개를 포장해주세요.
    
    // 기존의 active 된 요소들에서 active 제거
    $ctr.find('.active').removeClass('active');
    
    $ctr.find('div:nth-child(' + (index + 1) + ')').addClass('active');
});


/*페이지*/
    let totalData = 1000;    // 총 데이터 수
    let dataPerPage = 20;    // 한 페이지에 나타낼 데이터 수
    let pageCount = 10;        // 한 화면에 나타낼 페이지 수
    
    function paging(totalData, dataPerPage, pageCount, currentPage){
        
        console.log("currentPage : " + currentPage);
        
        let totalPage = Math.ceil(totalData/dataPerPage);    // 총 페이지 수
        let pageGroup = Math.ceil(currentPage/pageCount);    // 페이지 그룹
        
        console.log("pageGroup : " + pageGroup);
        
        let last = pageGroup * pageCount;    // 화면에 보여질 마지막 페이지 번호
        if(last > totalPage)
            last = totalPage;
        let first = last - (pageCount-1);    // 화면에 보여질 첫번째 페이지 번호
        let next = last+1;
        let prev = first-1;
        
        console.log("last : " + last);
        console.log("first : " + first);
        console.log("next : " + next);
        console.log("prev : " + prev);
 
        let $pingingView = $(".paging");
        
        let html = "";
        
        if(prev > 0)
            html += "<a href=# id='prev'><</a> ";
        
        for(let i=first; i <= last; i++){
            html += "<a href='#' id=" + i + ">" + i + "</a> ";
        }
        
        if(last < totalPage)
            html += "<a href=# id='next'>></a>";
        
        $(".paging").html(html);    // 페이지 목록 생성
        $(".paging a").css("color", "black");
        $(".paging a#" + currentPage).css({"text-decoration":"none", 
                                           "color":"red", 
                                           "font-weight":"bold"});    // 현재 페이지 표시
                                           
        $(".paging a").click(function(){
            
            let $item = $(this);
            let $id = $item.attr("id");
            let selectedPage = $item.text();
            
            if($id == "next")    selectedPage = next;
            if($id == "prev")    selectedPage = prev;
            
            paging(totalData, dataPerPage, pageCount, selectedPage);
        });
                                           
    }
    
    $("document").ready(function(){        
        paging(totalData, dataPerPage, pageCount, 1);
    });
 
    $('.check').click(function(){

    });

/* 상품이름 누르면 수정창 뜨게 */

$(".stfName").click(function(){
    $(this).parent().find('.stfForm').find('.toggle').toggle();
});


    /* 체크박스 체크하면 수정가능하게 input태그 변경해주는 함수 */
$(document).ready(function(){
	$("#modify1").click(function(){
		if($(".details1").prop("disabled")){
			$(".details1").prop("disabled",false);
		}
        else{
            $(".details1").prop("disabled",true);
        }
	});
	$("#modify2").click(function(){
		if($(".details2").prop("disabled")){
			$(".details2").prop("disabled",false);
		}
        else{
            $(".details2").prop("disabled",true);
        }
	});
    $("#modify3").click(function(){
		if($(".details3").prop("disabled")){
			$(".details3").prop("disabled",false);
		}
        else{
            $(".details3").prop("disabled",true);
        }
	});
    $("#modify4").click(function(){
		if($(".details4").prop("disabled")){
			$(".details4").prop("disabled",false);
		}
        else{
            $(".details4").prop("disabled",true);
        }
	});
    $("#modify5").click(function(){
		if($(".details5").prop("disabled")){
			$(".details5").prop("disabled",false);
		}
        else{
            $(".details5").prop("disabled",true);
        }
	});
});