window.onload = function() {
	var bgImg = document.querySelector('#blogBgImg');
	var img = document.querySelector("#blog img");
	
	if(img.src) 
		bgImg.style.backgroundImage = 'url(' + img.src + ')'; 
};
