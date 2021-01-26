$("#nav ul li a[href^='#']").on('click', function(e) {

    
    e.preventDefault();

    
    $('html, body').animate({
        scrollTop: $(this.hash).offset().top
      }, 300, function(){

      l
        
        window.location.hash = this.hash;
      });

 });