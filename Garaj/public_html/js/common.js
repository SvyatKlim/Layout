$(document).ready(function() {

  $("#phone").mask("+79999999999");
  $("#phone1").mask("+79999999999");
  $("#phone2").mask("+79999999999");
  $("#phone3").mask("+79999999999");
  $("#phone4").mask("+79999999999");
  $("#phone5").mask("+79999999999");
  $("#phone6").mask("+79999999999");
  $("#phone7").mask("+79999999999");
  $("#phone8").mask("+79999999999");
  $("#phone9").mask("+79999999999");

	var menuBtn = $('.hamburger');
	var menu = $('.mobile-nav');
	menuBtn.on('click', function(event) {
		event.preventDefault();
		menu.toggleClass('mobile-nav__active');
		menuBtn.toggleClass('hamburger is-active');
  });

   $('.mobile-nav a').click(function() {
  	menuBtn.toggleClass('hamburger is-active');
  	menu.toggleClass('mobile-nav__active');
  });

  $(".menu").on("click","a", function(event) {
    event.preventDefault();
    var id  = $(this).attr('href'),
    top = $(id).offset().top;
    $('body,html').animate({scrollTop: top}, 1500);
  });

  $('.services-item').equalHeights();

  $('.callback-btn').on('click', function(){
  	event.preventDefault();
  	$('#callback').fadeIn();
  });

  $('.technics-item-btn').on('click', function(){
    event.preventDefault();
    $('#sale-moto').fadeIn();
  });

  $('.services-btn').on('click', function(){
  	event.preventDefault();
  	$('#sale-moto').fadeIn();
  });

   $('.popup-close').on('click', function(){
  	event.preventDefault();
  	$('.popup').fadeOut();
  });

  //E-mail Ajax Send
  $(".callback").submit(function() { //Change
    var th = $(this);
    $.ajax({
      type: "POST",
      url: "mail.php", //Change
      data: th.serialize()
    }).done(function() {
        window.location.href = "thanks.html";
      setTimeout(function() {
        th.trigger("reset");
        $('.popup').fadeOut();
      }, 3000);
    });
    return false;
  });

});
