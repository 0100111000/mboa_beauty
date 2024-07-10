
  (function ($) {
  
  "use strict";

    // NAVBAR
    $('.navbar-collapse a').on('click',function(){
      $(".navbar-collapse").collapse('hide');
    });

    $(function() {
      $('.hero-slides').vegas({
          slides: [
              { src: 'images/slides/imh.jpg' },
              { src: 'images/slides/a.jpg' },
              { src: 'images/slides/b.jpg' },
              { src: 'images/slides/c.jpg' },
              { src: 'images/slides/d.jpg' },
              { src: 'images/slides/e.jpg' },
              { src: 'images/slides/f.jpg' },
              { src: 'images/slides/i.jpg' },
              { src: 'images/slides/j.jpg' },
              { src: 'images/slides/k.jpg' },
              { src: 'images/slides/l.jpg' },
              { src: 'images/slides/m.jpg' },
              { src: 'images/slides/n.jpg' }
          ],
          timer: false,
          animation: 'kenburns',
      });
    });
    
    // CUSTOM LINK
    $('.smoothscroll').click(function(){
      var el = $(this).attr('href');
      var elWrapped = $(el);
      var header_height = $('.navbar').height() + 60;
  
      scrollToDiv(elWrapped,header_height);
      return false;
  
      function scrollToDiv(element,navheight){
        var offset = element.offset();
        var offsetTop = offset.top;
        var totalScroll = offsetTop-navheight;
  
        $('body,html').animate({
        scrollTop: totalScroll
        }, 300);
      }
    });
  
  })(window.jQuery);


