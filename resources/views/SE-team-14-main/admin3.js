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
});


let slideWrapper = document.querySelector('.event_banner');
    let slides = document.querySelectorAll('.event');
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