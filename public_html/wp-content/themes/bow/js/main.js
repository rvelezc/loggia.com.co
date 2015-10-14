var windowHeight = jQuery(window).height();
var windowWidth = jQuery(window).width();


jQuery(document).ready(function($) {
   'use strict';
	

   
	//Navigation Menu
	$(".header .logo").click(function(e){
		if($('section.homepage').length){
			$('html,body').animate({scrollTop: 0}, 'slow');
		} 
	});

    $(".header .menu").click(function(e){
    	$('nav.navigation').fadeToggle("slow");
		$("nav.navigation .menu").css('margin-top', (windowHeight - $("nav.navigation .menu").height()) / 2);
		if($('.header .menu').hasClass("close")) {
			$(".header .menu").removeClass("close");
		} else {
			$(".header .menu").addClass("close");
		}
    });

	$(".navigation .menu li").hover(function(e){
		$('.navigation .menu li').stop().animate({ opacity: "0.5" }, 'slow');
		$(this).stop().animate({ opacity: "1" }, 'slow');
	}, function(){ 
		$('.navigation .list li').stop().animate({ opacity: "1" }, 'slow');
	});

	$(".navigation .menu li").click(function(e){
		var url = $(this).attr("data-url");
		window.location = url;
	});

	$(".navigation .social li").click(function(){
		var url = $(this).attr("data-url");
		window.open(url, '_blank');
	});
	//Navigation Menu

	//Navigate
	$(".error-page .back").click(function(){
		var url = $(this).attr("data-url");
		window.open(url, "_self");
	});
	//Navigate
	

	//Home
	$(".homepage .discover").hover(function(e){
		$(this).removeClass("fadeInDownHalf");
		$(this).removeClass("animated");
	});

	$(".homepage .discover").click(function(){
		var url = $(this).attr("data-url");
		window.open(url, '_self');
	});

	$(".homepage .slide").each(function() {
		$(this).css("background-image", "url("+$(this).attr("data-url")+")");
	});

	$('.homepage .slider').flexslider({
	    animation: "fade",
	    animationLoop: true,
	    animationSpeed: 500,
	    slideshow: true,
	    pauseOnHover: false,
	    controlNav: true,
	    directionNav: true
 	});
	//Home

	//Work
	$(".work .navigate li").click(function(){
		var album = $(this).text().toLowerCase();
		$(".work .navigate li").removeClass("active");
		$(this).addClass("active");
		loadPortfolio(album);
	});

	$(document).on('mouseover', '.work .image', function(e) {
		$('.work .image').stop().animate({ opacity: "0.5" }, 'slow');
		$(this).stop().animate({ opacity: "1" }, 'slow');
	});	
		
	$(document).on('mouseleave', '.work .image', function(e) {
		$('.work .image').stop().animate({ opacity: "1" }, 'slow');
	});	

	$(".work .album").click(function(){
		var url = $(this).attr("data-url");
		window.open(url, "_self");
	});

	$(".link").click(function(e){
		var url = $(this).attr("data-url");
		window.location = url;
	});
	//Work


	$(".post-loop").hover(function(e){
		$('.post-loop').stop().animate({ opacity: "0.25" }, 'slow');
		$(this).stop().animate({ opacity: "1" }, 'slow');
	}, function(){ 
		$('.post-loop').stop().animate({ opacity: "1" }, 'slow');
	});



	$("article.post .social .facebook").click(function(){
		var url = $(location).attr('href');
		window.open("https://www.facebook.com/sharer/sharer.php?u="+url, "Share", "resizable=yes,width=640, height=360");
	});

	$("article.post .social .twitter").click(function(){
		var url = $(location).attr('href');
		window.open("https://twitter.com/home?status="+url, "Tweet", "resizable=yes,width=640, height=360");
	});


});

jQuery(window).load(function() {

	fixSizes();
	loadPortfolio("all");
	
	jQuery(".work .navigate").append("<select></select>");
	jQuery(".work .navigate li").each(function() {
		jQuery(".work .navigate select").append("<option>"+jQuery(this).text()+"</option>");
	});

	jQuery(".work .navigate select").change(function() {
		var album = jQuery(".work .navigate select option:selected").text().toLowerCase();
		jQuery(".work .navigate li").removeClass("active");
		jQuery(this).addClass("active");
		loadPortfolio(album);
	});

	jQuery(".loader").delay(500).fadeOut('slow');
	animateIt();

});

var lastWidth = jQuery(window).width();
jQuery(window).bind('resize', function(e)
{
    window.resizeEvt;
    jQuery(window).resize(function()
    {
        clearTimeout(window.resizeEvt);
        window.resizeEvt = setTimeout(function()
        {
			fixSizes();
			if(jQuery(window).width()!=lastWidth){
			  lastWidth = jQuery(window).width();
			  loadPortfolio("all");
			}
        }, 150);
    });
});



function fixSizes() {

	windowHeight = jQuery(window).height();
	windowWidth = jQuery(window).width();

	//FULLSCREEN
	jQuery(".fullscreen").css('height', windowHeight);

	//WORK STREAM
	jQuery(".work .stream").css('width', jQuery(window).width() - 15);
	if (windowWidth > 767) jQuery(".work .stream").css('width', jQuery(window).width() - 325);
	
	
	//PAGE FIX
	if(windowWidth>959) {

		jQuery(".page .content").css('height', jQuery(".page .cover").height() - 100);
		var pg = jQuery(".page .text").height() + jQuery(".page .info").height() + 50;
		if(jQuery(".page .content").height() < pg) {

			jQuery(".page .content").mCustomScrollbar({
	    		axis:"y",
	    		theme:"dark"
			});

			jQuery(".page .content").css('padding-right', 0);

		} else {
			var gt = jQuery(".page .content").height() - pg;
			jQuery(".page .info").css('margin-top', gt + 50);
			jQuery(".page .content").css('overflow-y', "hidden");
		}

	}


	//FIX WORK PREVIEW
	jQuery(".work-preview .frame").css('height', windowHeight-160);

	//FIX HOME PAGE VIDEO
	var rat = windowWidth / windowHeight;
	if (rat > (16/9)) {

		var v = windowWidth * (16/9);
		jQuery(".homepage video").css('width', windowWidth);
		jQuery(".homepage video").css('height', v);

		var vc = (jQuery(".homepage video").height() - windowHeight) / 2;
		jQuery(".homepage video").css('margin-top', '-'+vc+'px');
		jQuery(".homepage video").css('margin-left', '0px');

	} else {

		var v = windowHeight * (16/9);
		jQuery(".homepage video").css('height', windowHeight);
		jQuery(".homepage video").css('width', v);

		var vc = (jQuery(".homepage video").width() - windowWidth) / 2;
		jQuery(".homepage video").css('margin-top', '0px');
		jQuery(".homepage video").css('margin-left', '-'+vc+'px');

	}


	// VERTICALLY CENTER
	jQuery(".vertical-center").each(function() {
		jQuery(this).css('margin-top', (jQuery(this).parent().height() - jQuery(this).height()) / 2);
	});


	//FIX HOME PAGE TEXT
	var home = jQuery(".homepage .title").width() - 25;
	var slog = jQuery(".homepage .slogan .phrase").width() + 50;
	jQuery(".homepage .slogan .before, .homepage .slogan .after").css('width', (home - slog) / 2);


	//FIX HOME PAGE SLIDER
	var z = (windowHeight - jQuery(".homepage .flex-control-nav").height()) / 2;
	jQuery(".homepage .flex-control-nav").css('top', z);
	jQuery(".homepage .flex-prev").css('top', z - 60);
	jQuery(".homepage .flex-next").css('top', z + jQuery(".homepage .flex-control-nav").height() + 55);

}





function loadPortfolio(album) {

	jQuery(".stream .image").removeClass("active");

	if(jQuery(".stream .row").length > 0) {
		jQuery(".stream").append(jQuery(".stream .image"));
		jQuery(".stream .image").css("opacity", 0);
		jQuery(".stream .row").remove();		
	}

	if(album=="all") {
		jQuery(".stream .image").addClass("active");
		jQuery(".work .navigate li").eq(0).addClass("active");
	} else {
		jQuery(".stream .image").each(function() {
			if (jQuery(this).attr("data-album").toLowerCase() == album) {
				jQuery(this).addClass("active");
			}
		});
	}

	var s = jQuery(".stream").width();
	jQuery(".stream").attr("data-width", s);
	var z = 0;

	jQuery(".stream").append("<div class='row'></div>");
	jQuery(".stream .image").each(function() {

		if(jQuery(this).hasClass("active")) {

		    var image = jQuery(this);
		    var link = jQuery(this).attr("data-url");
		    var w = jQuery(this).attr("data-width");
		    var h = jQuery(this).attr("data-height");
		    var l = 300 * (w / h);
		    jQuery(this).css("background-image", "url("+link+")");
		    jQuery(this).css("width", l);
		    var t = s/z;
		    if (t > 1.5 && s > 767) {
		    	z += l;
		    	jQuery(".stream .row").last().append(jQuery(this));
		    } else {
		    	z = l;
		    	jQuery(".stream .row").last().append(jQuery(this));
	    		var m = 25;
				var j = 0;
				jQuery(".stream .row").last().find("div.image").each(function() {
				    j += jQuery(this).width();
				});
				var p = j - s;
				if(j < s) p = s - j;
				jQuery(".stream .row").last().find("div.image").each(function() {
					var i = jQuery(this).width();
					var f = p * (i / j);
					var r = i - f;
					if(j < s) r = i + f;
					jQuery(this).css('width', r - m);
					jQuery(this).attr("z-width", r - m);
					jQuery(this).attr("z-height", 300);
					if(!jQuery(this).is(":last-child")) {
						jQuery(this).css('margin-right', m);
					}
				});

		    	jQuery(".stream").append("<div class='row'></div>");
		    }

	   	}

	});

	jQuery(".stream .image").stop().animate({ opacity: "1" }, 'slow');
	if(jQuery(".stream .row").last().children().length == 0) jQuery(".stream .row").last().remove();

	jQuery( document ).on( "click", ".stream div.image", function() {
		openImage(jQuery(this));
	});

}


function openImage(image) {

	var windowHeight = jQuery(window).height();
	var windowWidth = jQuery(window).width();

	var image = image;
	var img = image.attr("data-url");
	var caption = image.attr("data-caption");
	var album = image.attr("data-album");
	var description = image.attr("data-description");
	var current = jQuery('.work .stream .active').index(image);
	var total = jQuery('.work .stream .active').length;
	var fHeight = windowHeight - 150;
	var fWidth = windowWidth - 200;
	var marg = ((windowHeight - 100) / 2) + 40;
	var video = image.attr('data-video');
	var video = video.replace("watch?v=", "v/");
	

	var meta = "<div class='info'><div class='meta'><span class='picture-title'>"+caption+"</span><span class='album-title'>"+album+"</span><span class='current'>"+(current+1)+" / "+total+"</span></div><div class='close'></div></div>";
	
	var source;
	if(video){
		var source = "<div class='video-container'><iframe width='"+fWidth+"' height='"+fHeight+"' src='"+video+"' frameborder='0' allowfullscreen></iframe></div>";
	}else{
		var source = "<img src='"+img+"' alt='"+caption+"'>";
	}
	

		if(description){
				var frame = "<div class='frame' style='height:"+fHeight+"px'>"+source+"<div class='description'><div class='data-description'>"+ description +"</div></div></div>";
		}else{
				var frame = "<div class='frame' style='height:"+fHeight+"px'>"+source+"<div class='description'></div></div>";
		}

	
	
	var nav = "<div class='nav'><div class='prev' style='top: "+marg+"px;'>Prev</div><div class='next' style='top: "+marg+"px;'>Next</div></div>";
	
	jQuery.magnificPopup.open({
		items: [{
		    src: "<div class='work-preview'>"+meta+frame+nav+"</div>",
		    type: "inline"
		},{
        src: '<div>HTML string</div>',
        type: 'inline'
      },],
		callbacks: {
			open: function() {
				jQuery(document).find('.video-container').fitVids()
			},
		}
	});
	

	


	//DISABLE PREV IF FIRST IMAGE
	if(current==0) {
		jQuery('.work-preview .prev').addClass("disabled");
	}

	//FIX VERTICAL CENTER
	jQuery('.work-preview img').css('margin-top', (jQuery('.work-preview .frame').height() - jQuery('.work-preview img').height()) / 2);

	jQuery('.work-preview .close').click(function(e){
		var magnificPopup = jQuery.magnificPopup.instance;
		magnificPopup.close();
	});

	jQuery('.work-preview .next').click(function(e){

		if(current<total-1) {
			
			var windowHeight = jQuery(window).height();
			var windowWidth = jQuery(window).width();

			current++;

			var i = jQuery('.work .stream .active').eq(current);
			img = i.attr("data-url");
			caption = i.attr("data-caption");
			album = i.attr("data-album");
			description = i.attr("data-description");
			var video = i.attr('data-video');
			var video = video.replace("watch?v=", "v/");
			
			var fHeight = windowHeight - 150;
			var fWidth = windowWidth - 200;


			jQuery('.work-preview .meta .picture-title').text(caption);
			jQuery('.work-preview .meta .album-title').text(album);
			jQuery('.work-preview .frame img').attr('src', img);
			jQuery('.work-preview .meta .current').text((current+1)+' / '+total);
			if(description){
				jQuery('.work-preview .frame .description').html('<div class="data-description">'+description+'</div>');
			}else{
				jQuery('.work-preview .frame .description').html('&nbsp;');
			}
			
			
			
			var source;
			if(video){
				var source = "<div class='video-container'><iframe width='"+fWidth+"' height='"+fHeight+"' src='"+video+"' frameborder='0' allowfullscreen></iframe></div>";
			}else{
				var source = "<img src='"+img+"' alt='"+caption+"'>";
			}
	

			if(description){
					var frame = ""+source+"<div class='description'><div class='data-description'>"+ description +"</div></div>";
			}else{
					var frame = ""+source+"<div class='description'></div>";
			}
			
			jQuery('.work-preview .frame').html(frame)
			
			

			//FIX VERTICAL CENTER
			jQuery('.work-preview img').css('margin-top', (jQuery('.work-preview .frame').height() - jQuery('.work-preview img').height()) / 2);

			//FIX PREV BUTTON
			if(!current==0) {
				jQuery('.work-preview .prev').removeClass("disabled");
			}

			//DISABLE IF LAST IMAGE
			if(current==total-1) {
				jQuery(this).addClass("disabled");
			}
			
			jQuery(document).find('.video-container').fitVids()
			
		}

	});

	jQuery('.work-preview .prev').click(function(e){

		if(current>0) {

			current--;
			
			var windowHeight = jQuery(window).height();
			var windowWidth = jQuery(window).width();

			var i = jQuery('.work .stream .active').eq(current);
			img = i.attr("data-url");
			caption = i.attr("data-caption");
			album = i.attr("data-album");
			description = i.attr("data-description");
			var video = i.attr('data-video');
			var video = video.replace("watch?v=", "v/");
			var fHeight = windowHeight - 150;
			var fWidth = windowWidth - 200;

			jQuery('.work-preview .meta .picture-title').text(caption);
			jQuery('.work-preview .meta .album-title').text(album);
			jQuery('.work-preview .frame img').attr('src', img);
			jQuery('.work-preview .meta .current').text((current+1)+' / '+total);
			if(description){
				jQuery('.work-preview .frame .description').html('<div class="data-description">'+description+'</div>');
			}else{
				jQuery('.work-preview .frame .description').html('&nbsp;');
			}
			
			var source;
			if(video){
				var source = "<div class='video-container'><iframe width='"+fWidth+"' height='"+fHeight+"' src='"+video+"' frameborder='0' allowfullscreen></iframe></div>";
			}else{
				var source = "<img src='"+img+"' alt='"+caption+"'>";
			}
	

			if(description){
					var frame = ""+source+"<div class='description'><div class='data-description'>"+ description +"</div></div>";
			}else{
					var frame = ""+source+"<div class='description'></div>";
			}
			
			jQuery('.work-preview .frame').html(frame)

			//FIX VERTICAL CENTER
			jQuery('.work-preview img').css('margin-top', (jQuery('.work-preview .frame').height() - jQuery('.work-preview img').height()) / 2);

			if(current==0) {
				jQuery(this).addClass("disabled");
			}

			if(current<total) {
				jQuery('.work-preview .next').removeClass("disabled");
			}
			
			jQuery(document).find('.video-container').fitVids()
			
		}

	});

}




function animateIt() {
	
	//Animations
	setTimeout(function(){jQuery('.header').addClass('animated fadeInDown')},500); 
	setTimeout(function(){jQuery('.blog .inner').addClass('animated fadeInUp')},500); 
	setTimeout(function(){jQuery('.homepage .title').addClass('animated fadeInLeft')},500);
    setTimeout(function(){jQuery('.homepage .slogan').addClass('animated fadeInRight')},500);

    setTimeout(function(){jQuery('section.work .navigate').addClass('animated fadeInLeft')},500);
    setTimeout(function(){jQuery('section.work .stream').addClass('animated fadeInRight')},500);



    //Animations

}


function loadPortfolio2(album) {

	jQuery(".stream .image").removeClass("active");

	if(album=="all") {
		jQuery(".stream .image").addClass("active");
		jQuery(".work .navigate li").eq(0).addClass("active");
	} else {
		jQuery(".stream .image").each(function() {		
			if (jQuery(this).attr("data-album").toLowerCase() == album) {
				jQuery(this).addClass("active");
			}
		});
	}

	var s = jQuery(".stream").width();
	jQuery(".stream").attr("data-width", s);
	var z = 0;

	jQuery(".stream").append("<div class='row'></div>");
	jQuery(".stream .image").each(function() {

		if(jQuery(this).hasClass("active")) {

		    var image = jQuery(this);
		    var link = jQuery(this).attr("data-url");
		    var w = jQuery(this).attr("data-width");
		    var h = jQuery(this).attr("data-height");
		    var l = 300 * (w / h);
		    jQuery(this).css("background-image", "url("+link+")");
		    jQuery(this).css("width", l);
		    var t = s/z;
		    if (t > 1.5 && s > 767) {
		    	z += l;
		    	jQuery(".stream .row").last().append(jQuery(this));
		    } else {
		    	z = l;
		    	jQuery(".stream .row").last().append(jQuery(this));
	    		var m = 25;
				var j = 0;
				jQuery(".stream .row").last().find("div.image").each(function() {
				    j += jQuery(this).width();
				});
				var p = j - s;
				if(j < s) p = s - j;
				jQuery(".stream .row").last().find("div.image").each(function() {
					var i = jQuery(this).width();
					var f = p * (i / j);
					var r = i - f;
					if(j < s) r = i + f;
					jQuery(this).css('width', r - m);
					jQuery(this).attr("z-width", r - m);
					jQuery(this).attr("z-height", 300);
					if(!jQuery(this).is(":last-child")) {
						jQuery(this).css('margin-right', m);
					}
				});

		    	jQuery(".stream").append("<div class='row'></div>");
		    }

	   	}

	});

	if(jQuery(".stream .row").last().children().length == 0) jQuery(".stream .row").last().remove();

	jQuery( document ).on( "click", ".stream div.image", function() {
		openImage(jQuery(this));
	});

}

jQuery(document).ready(function($) {
   'use strict';
	
	var cat = "All";
	var selector = ".stream > .image";
	$('.navigate ul li').click(function(){
		cat = $(this).text();
		selector = ".stream > .image[data-album='"+ cat +"']";
	});
	
	var $container = $('.stream'); 
 	$container.infinitescroll({
		navSelector  : ".navi",            
		nextSelector : ".navi > a",    
		itemSelector : selector
	}, function(newElements){
		var $newElems = $(newElements);
		$newElems.css({ opacity: 0 });
		loadPortfolio2(cat.toLowerCase());
		$newElems.animate({ opacity: 1 }, 'slow');	
		$('.stream .row:empty').remove();
		return false;
	}); 
});