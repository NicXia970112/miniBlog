var corner = document.getElementsByClassName('corner');
var collect = document.getElementsByClassName("collect");
var notcollect = document.getElementsByClassName("notCollect");
var len = corner.length;

for(var i = 0; i < len; i++) {
	corner[i].idx = i;
	notcollect[i].style.display = 'none';
	corner[i].addEventListener('click', function(ev) {
		ev = ev || window.event;
		var tar = ev.target;
		//ev.preventDefault();
		
		if(tar.className == 'collect') {
			tar.style.display = 'none';
			notcollect[this.idx].style.display = 'inline-block';
		} else if(tar.className == 'notCollect') {
			tar.style.display = 'none';
			collect[this.idx].style.display = 'inline-block';
		}
	});
}
