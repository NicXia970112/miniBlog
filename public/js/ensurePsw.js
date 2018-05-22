window.onload = function() {
	var np = document.getElementById("newPsw");
	var rp = document.getElementById("rePsw");
	var wr = document.getElementById("warn");
	
	rp.addEventListener('blur', function() {
		if(rp.value !== np.value) {
			wr.style.display = 'inline-block';
		} else {
			wr.style.display = 'none';
		}
	});
};
