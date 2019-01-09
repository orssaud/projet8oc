var goTop = document.getElementById("goTop");
var timeOut;

window.onscroll = function(){scrollFunction()};
goTop.onclick = function(){scrollToTop()};

function scrollFunction() {
    if (document.body.scrollTop > 150 || document.documentElement.scrollTop > 150) {
        goTop.style.display = "block";
    } else {
        goTop.style.display = "none";
    }
}


function scrollToTop() {
  if (document.body.scrollTop !=0 || document.documentElement.scrollTop !=0){
    window.scrollBy(0,-50);
    timeOut = setTimeout('scrollToTop()',10);
  }
  else clearTimeout(timeOut);
}

