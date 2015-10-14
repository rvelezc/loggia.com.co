(function($) {

  'use strict';


  $(window).load(function(){
    // Container
    var $container = $('.isotope-container');
    $container.isotope({
      filter:'*',
      animationOptions: {
        duration: 750,
        easing: 'linear',
        queue: false,
      }
    });

    // Isotope Button
    $('#options li a').click(function(){
      var selector = $(this).attr('data-filter');
      $container.isotope({
        filter:selector,
        animationOptions: {
          duration: 750,
          easing: 'linear',
          queue: false,
        }
      });
      return false;
    });

    var $optionSets = $('#options'),
      $optionLinks = $optionSets.find('a');

      $optionLinks.click(function(){
        var $this = $(this);
        // don't proceed if already selected
        if ($this.hasClass('selected')) {
          return false;
        }
        var $optionSet = $this.parents('#options');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected'); 

        $('.foliobox').removeClass('active');      
        $container.isotope( 'on', 'layoutComplete', function() {
          $('.foliobox').each(function(){
            $this = $(this);
               if($this.is(':visible')){
                  $this.addClass('active')
               }
          })
        } )

      });



  });


$(document).on('mouseover', '.work-mansonry .image', function(e) {
    $('.work-mansonry .image').stop().animate({ opacity: "0.5" }, 'slow');
    $(this).stop().animate({ opacity: "1" }, 'slow');
  }); 
    
  $(document).on('mouseleave', '.work-mansonry .image', function(e) {
    $('.work-mansonry .image').stop().animate({ opacity: "1" }, 'slow');
  }); 

  //Work
  jQuery( document ).on( "click", ".portfolio-list div.image", function() {
    openImage2(jQuery(this));
  });


function openImage2(image) {

  var windowHeight = jQuery(window).height();
  var windowWidth = jQuery(window).width();

  var image = image;
  var img = image.attr("data-url");
  var caption = image.attr("data-caption");
  var album = image.attr("data-album");
  var description = image.attr("data-description");
  var current = jQuery('.work-mansonry .portfolio-list .active').index(image);
  var total = jQuery('.work-mansonry .portfolio-list .active').length;
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



  jQuery('.work-preview .close').click(function(e){
    var magnificPopup = jQuery.magnificPopup.instance;
    magnificPopup.close();
  });

  jQuery('.work-preview .next').click(function(e){

    if(current<total-1) {
      
      var windowHeight = jQuery(window).height();
      var windowWidth = jQuery(window).width();

      current++;

      var i = jQuery('.work-mansonry .portfolio-list .active').eq(current);
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

      var i = jQuery('.work-mansonry .portfolio-list .active').eq(current);
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





})( jQuery );