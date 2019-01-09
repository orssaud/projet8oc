var reportObj = {
	idDiv : null,
		init: function(idDiv){
				this.idDiv = idDiv;
			this.idDiv.addEventListener("click", function() {
	
                localStorage.setItem(this.idDiv.id, true);
        
            }.bind(this));
		},

}


var comments = document.getElementById('comments');
var commentsId = document.querySelectorAll('[id^="report_"]');


for (var i = 0; i < commentsId.length; i++) {

	if(localStorage.getItem(commentsId[i].id) !== null){
		commentsId[i].firstElementChild.style.display = "none";
		var info = createHtml(commentsId[i], "p", 'merci d\'avoir signaler le message');
		info.classList.add("reported");
	}else{

		var newObject = Object.create(reportObj);
	    newObject.init(commentsId[i]);

	}
            

}


function createHtml(parent, type, contenu = '') {

    var elem = document.createElement(type);
    elem.appendChild(document.createTextNode(contenu));
    parent.appendChild(elem);

    return elem;
}
