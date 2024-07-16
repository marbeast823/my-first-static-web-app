$(function(){
 
   $('a[href^=#gotop] , area[href^=#gotop] ').click(function() {
    
      var speed = 800;
   
      var href= $(this).attr("href");
   
      var target = $(href == "#gotop" || href == "" ? 'html' : href);
   
      var position = target.offset().top;
    
      $('html, body').animate({scrollTop:position}, speed, 'swing');
      return false;
   });
});
