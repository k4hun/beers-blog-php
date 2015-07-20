var num = -1;
var timer1 = 0;
var timer2 = 0;
 
function startSlider() {
  timer1 = setTimeout("changeSlide()", 500);
}

function setSlide(id) {
  clearTimeout(timer1);
  clearTimeout(timer2);

  hideSlide();
  switch(id) {
    case "next":
      break;
    case "prev":
      num -=2;
      break;
    default:
      num = id-1;
      break;
  }
  timer1 = setTimeout("changeSlide()", 500);
}

function hideSlide() {
  $('#slide'+num).fadeOut('500');  
  document.getElementById('slider-nav-'+num).className = 'btn btn-default';
}

function changeSlide() {
  num++; if (num>2) num=0; else if (num<0) num=2
  var id = "#slide" + num;
  $(id).fadeIn('500');
  document.getElementById('slider-nav-'+num).className = 'btn btn-primary';

  timer1 = setTimeout("changeSlide()", 5000);
  timer2 = setTimeout("hideSlide()", 4500);
}

var main = function() {
  $('.icon-menu').click(function() {
    $('.side-menu').animate({
      left: "0px"
    }, 500);
    $('.icon-menu').fadeOut();
  });

  $('.hide-menu').click(function() {
    $('.side-menu').animate({
      left: "-120px"
    }, 500);
    $('.icon-menu').fadeIn();
  });
};

$(document).scroll(function () {
    if ($(this).scrollTop() > 830) {
        $(".icon-menu").css('color', '#fe5f35');
    }
    else {
        $(".icon-menu").css('color', '#ffffff')
    }
});

$(document).ready(main);
$(document).on('page:load', main)