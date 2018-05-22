var aCell = document.getElementsByClassName('cell');
var aInput = document.getElementsByTagName('input');
var aPrompt = document.getElementsByClassName('prompt');

for(var i = 0; i < aCell.length; i++) {
	aInput[i].index = i;
	
	aInput[i].addEventListener('focus', function() {
		aPrompt[this.index].style.display = 'inline-block';
	});
	
	aInput[i].addEventListener('blur', function() {
		aPrompt[this.index].style.display = 'none';
	});
}
