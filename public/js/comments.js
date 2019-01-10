// newComments  allComments  reportedComments
var newButton = document.getElementById('new');
var allButton = document.getElementById('all');
var reportedButton = document.getElementById('reported');

// default
show('newComments');
show('allComments', false);
show('reportedComments', false);



newButton.addEventListener("click", function() {
	show('newComments');
	show('allComments', false);
	show('reportedComments', false);
		newButton.classList.add("active");
		allButton.classList.remove("active");
		reportedButton.classList.remove("active");
});
allButton.addEventListener("click", function() {
	show('newComments', false);
	show('allComments');
	show('reportedComments', false);
		allButton.classList.add("active");
		newButton.classList.remove("active");
		reportedButton.classList.remove("active");
});
reportedButton.addEventListener("click", function() {
	show('newComments', false);
	show('allComments', false);
	show('reportedComments');
		reportedButton.classList.add("active");
		newButton.classList.remove("active");
		allButton.classList.remove("active");
});



function show(id, show = true) {
	var elem = document.getElementById(id);
	if(show){
		elem.style.display = "block";
	}else{
		elem.style.display = "none";
	}
	
}
