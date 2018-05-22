window.onload = function() {
	var userInfo = document.getElementsByClassName('userInfo')[0];
	var userMore = document.getElementsByClassName('userMore')[0];
	var num = 0;
	
	userInfo.addEventListener('click', function() {
		if(!num) {
			userMore.style.display = 'block';
			num++;		
		} else {
			userMore.style.display = 'none';
			num--;		
		}
	});
};