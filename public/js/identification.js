var ident = document.getElementById('ident');	
var Ia = ident.getElementsByTagName('a')[0];

if(Ia.innerHTML == '认证') {
	ident.className = 'identification act';
	Ia.style.color = '#fff';
	
} else {
	ident.className = 'identification';
	Ia.style.color = '#7d7d7d';
} 
