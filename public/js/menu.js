var menuButton = document.getElementById("menu");
var menuContent = document.getElementById("menu-content");

menuButton.addEventListener("click", function() {
		//console.log("hello");
		if(menuContent.classList.contains("animationOn")){
			menuContent.classList.remove("animationOn"); 
			menuContent.classList.add("animationOff"); 
			//console.log("off");
		}else{
			menuContent.classList.remove("animationOff");
           menuContent.classList.add("animationOn"); 
          // console.log("on");
		}
        
});