/*
*
*	Live Customiser Script
*	------------------------------------------------
	*	Akmanda Framework
	* 	Copyright Themes Awesome 2013 - http://www.themesawesome.com
*
*/
( function( $ ){		
	
	// HEADER STYLING

	wp.customize('menu_list',function( value ) {
		value.bind(function(to) {
			$('.navigation .menu li, .navigation .menu li a, .navigation .menu li a:visited').css('color', to ? to : '' );
		});
	});

	wp.customize('menu_list_hov',function( value ) {
		value.bind(function(to) {
			$('.navigation .menu li a:focus, .navigation .menu li a:hover').css('color', to ? to : '' );
		});
	});

	wp.customize('nav_social',function( value ) {
		value.bind(function(to) {
			$('.navigation .socials li').css('color', to ? to : '' );
		});
	});

	wp.customize('nav_social_hov',function( value ) {
		value.bind(function(to) {
			$('.navigation .socials li:hover').css('color', to ? to : '' );
		});
	});

	wp.customize('menu_copyright',function( value ) {
		value.bind(function(to) {
			$('.navigation .copyright').css('color', to ? to : '' );
		});
	});

	wp.customize('menu_copyright_link',function( value ) {
		value.bind(function(to) {
			$('.navigation .copyright a, .navigation .copyright a:visited').css('color', to ? to : '' );
		});
	});

	wp.customize('menu_copyright_link_hov',function( value ) {
		value.bind(function(to) {
			$('.navigation .copyright a:hover').css('color', to ? to : '' );
		});
	});

	wp.customize('homepage_title',function( value ) {
		value.bind(function(to) {
			$('.homepage .title').css('color', to ? to : '' );
		});
	});

	wp.customize('homepage_subtitle',function( value ) {
		value.bind(function(to) {
			$('.homepage .slogan').css('color', to ? to : '' );
		});
	});

	wp.customize('homepage_discover',function( value ) {
		value.bind(function(to) {
			$('.homepage .discover').css('color', to ? to : '' );
		});
	});

	// WORK STYLING

	wp.customize('filt',function( value ) {
		value.bind(function(to) {
			$('.work .navigate li, .footer .link').css('color', to ? to : '' );
		});
	});

	wp.customize('filt_hov',function( value ) {
		value.bind(function(to) {
			$('.work .navigate li:hover, .work .navigate li.active, .footer .link:hover').css('color', to ? to : '' );
		});
	});

	wp.customize('work_title',function( value ) {
		value.bind(function(to) {
			$('.work-preview .meta .picture-title').css('color', to ? to : '' );
		});
	});

	wp.customize('work_meta',function( value ) {
		value.bind(function(to) {
			$('.work-preview .meta .album-title, .work-preview .meta span').css('color', to ? to : '' );
		});
	});

	wp.customize('work_nav',function( value ) {
		value.bind(function(to) {
			$('.work-preview .nav .prev, .work-preview .nav .next').css('color', to ? to : '' );
		});
	});

	wp.customize('work_pic_bg',function( value ) {
		value.bind(function(to) {
			$('.work-preview .frame').css('background-color', to ? to : '' );
		});
	});

	// POST STYLING

	wp.customize('post_loop_bg',function( value ) {
		value.bind(function(to) {
			$('.post-loop .post-info').css('background-color', to ? to : '' );
		});
	});

	wp.customize('loop_pagina_cur',function( value ) {
		value.bind(function(to) {
			$('.pagination .current').css('color', to ? to : '' );
		});
	});

	wp.customize('loop_pagina',function( value ) {
		value.bind(function(to) {
			$('.pagination a.inactive').css('color', to ? to : '' );
		});
	});

	wp.customize('loop_meta',function( value ) {
		value.bind(function(to) {
			$('.post-loop .date, body .sticky .post-info:before').css('color', to ? to : '' );
		});
	});

	wp.customize('post_title',function( value ) {
		value.bind(function(to) {
			$('.post-loop .title h2, article .entry-title').css('color', to ? to : '' );
		});
	});

	wp.customize('entry_meta',function( value ) {
		value.bind(function(to) {
			$('article .entry-meta span').css('color', to ? to : '' );
		});
	});

	wp.customize('post_text',function( value ) {
		value.bind(function(to) {
			$('.entry-content p').css('color', to ? to : '' );
		});
	});

	wp.customize('post_category',function( value ) {
		value.bind(function(to) {
			$('.single-category-bottom a, .single-category-bottom a:visited, .single-tag-bottom a').css('color', to ? to : '' );
		});
	});

	wp.customize('post_category_hov',function( value ) {
		value.bind(function(to) {
			$('.single-category-bottom a:hover, .single-category-bottom a:focus, .single-tag-bottom a:hover').css('color', to ? to : '' );
		});
	});

	wp.customize('post_social',function( value ) {
		value.bind(function(to) {
			$('article .social li').css('color', to ? to : '' );
		});
	});

	wp.customize('post_author',function( value ) {
		value.bind(function(to) {
			$('article .author a, article .author a:visited').css('color', to ? to : '' );
		});
	});

	wp.customize('post_nav',function( value ) {
		value.bind(function(to) {
			$('.navigation-post .nav-previous a, .navigation-post .nav-next a').css('color', to ? to : '' );
		});
	});

	wp.customize('post_nav_hov',function( value ) {
		value.bind(function(to) {
			$('.navigation-post .nav-previous a:hover, .navigation-post .nav-next a:hover').css('color', to ? to : '' );
		});
	});

	wp.customize('comment_title',function( value ) {
		value.bind(function(to) {
			$('.comments-title h4').css('color', to ? to : '' );
		});
	});

	wp.customize('comment_title_bord',function( value ) {
		value.bind(function(to) {
			$('.comments-title').css('border-top-color', to ? to : '' );
			$('.comments-title, .comment-list li article.comment').css('border-bottom-color', to ? to : '' );
		});
	});

	wp.customize('comment_author',function( value ) {
		value.bind(function(to) {
			$('.comment-list li .meta-comment .comment-author .fn a').css('color', to ? to : '' );
		});
	});

	wp.customize('comment_content',function( value ) {
		value.bind(function(to) {
			$('.comment-list li .comment-meta, .comment-list li .comment-content p').css('color', to ? to : '' );
		});
	});

	wp.customize('blockquote',function( value ) {
		value.bind(function(to) {
			$('blockquote, blockquote p, blockquote cite').css('color', to ? to : '' );
		});
	});

	// FORM STYLING

	wp.customize('form_bord',function( value ) {
		value.bind(function(to) {
			$('input[type="text"], input[type="password"], input[type="email"], textarea, select, input[type="submit"]').css('border-color', to ? to : '' );
		});
	});

	wp.customize('form_bord_foc',function( value ) {
		value.bind(function(to) {
			$('input[type="text"]:focus, input[type="password"]:focus, input[type="email"]:focus, textarea:focus, , input[type="submit"]:hover').css('border-color', to ? to : '' );
			$('input[type="text"]:focus, input[type="password"]:focus, input[type="email"]:focus, textarea:focus, , input[type="submit"]:hover').css('color', to ? to : '' );
		});
	});

	wp.customize('btn_text',function( value ) {
		value.bind(function(to) {
			$('input[type="submit"]').css('background-color', to ? to : '' );
		});
	});

	


} )( jQuery );