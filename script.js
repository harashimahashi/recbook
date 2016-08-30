document.addEventListener('DOMContentLoaded', function(){
	var send = document.getElementById('sendAct');
	send.style.left = document.body.clientWidth / 2 - send.offsetWidth / 2 + 'px';
	var sendChild = send.children;
	var sendPos = send.getBoundingClientRect().left - send.offsetWidth / 1.5;
	for(var i = 0; i < sendChild.length; i++){
		sendChild[i].style.marginLeft = sendPos - send.clientWidth / 2 - sendChild[i].clientWidth / 2 + 'px';
	}
	var recipe = document.getElementById('recipe');
	recipe.onmousemove = function(){
		if(getComputedStyle(recipe).width > '227px'){
			recipe.style.marginLeft = sendPos - send.clientWidth / 2 - recipe.clientWidth / 2 + 'px';
		}
	}
	recipe.addEventListener('mouseup', function(){
		recipe.style.marginLeft = sendPos - send.clientWidth / 2 - recipe.clientWidth / 2 + 'px';
	});
});