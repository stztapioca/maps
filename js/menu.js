$(document).ready(function () {
      $('#nav li').hover(
        function () {
            //mostra sottomenu
            $('ul', this).stop(true, true).delay(50).slideDown(100);
 
        },
        function () {
            //nascondi sottomenu
            $('ul', this).stop(true, true).slideUp(200);       
        }
    );


});


