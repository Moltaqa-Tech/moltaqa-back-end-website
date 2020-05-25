$(document).ready(function() {
	$('.toggle_icon').on('click', function() {
                $(this).toggleClass('toggle_icon_open');
                $(".side_menu").toggleClass('side_menu_open');
                $("html , body").toggleClass('body-hiden');
                $(".side-header").toggle(400);
        });
        
        $(".title-tabs .tab").on("click",function(){
                $(this).addClass("active").siblings().removeClass("active");
                $('.portfolio-content div').css('display','none');
                $($(this).data('class')).css('display','block');
        });
});

