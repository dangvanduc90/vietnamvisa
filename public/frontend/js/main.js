jQuery(document).ready(function($){
	var offset = 300,offset_opacity = 1200,scroll_top_duration = 700,$back_to_top = $('.cd-top');
$(window).scroll(function(){
    ( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
        if( $(this).scrollTop() > offset_opacity ) {
            $back_to_top.addClass('cd-fade-out');
        }
    });
    $back_to_top.on('click', function(event){
        event.preventDefault();
        $('body,html').animate({
            scrollTop: 0 ,
        },scroll_top_duration);
    });


	$("select#change_lang").change(function () {
    	var select = $(this).val();
   	 	window.location = site_url+select;
	});

	var  clickmenu = true;
    $('.btn_menu_mobile').click(function(){
        if(clickmenu ==  true){
            $('.nav_menu').slideDown(500);
            clickmenu = false;
        }else{
            $('.nav_menu').slideUp(500);
            clickmenu = true;
        }
    });
    var clickmenumember = true;
    
    $('.btn_menu_member').click(function(){
        if(clickmenumember ==  true){
            $('.menu_member').slideDown(500);
            clickmenumember = false;
        }else{
            $('.menu_member').slideUp(500);
            clickmenumember = true;
        }
    });
    
	$("ul.nav-pills a").on('click', function(e) {
		e.preventDefault();  
		var tab_id = $(this).attr('href');
		//alert(tab_id);
		//tab_id.replace('#', '');
	   	$(tab_id).show();
	});

	$(".m-owl-blogs").owlCarousel({
		autoPlay:false,
		autoplayTimeout:1000,
		autoplayHoverPause:true,
		dots: false,
		pagination: true,
     	// "singleItem:true" is a shortcut for:
		items : 1,
		itemsDesktop : false,
		responsiveClass:true,
		nav : true,
		navText:  ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
		itemsTablet: [768,1]
	});
});