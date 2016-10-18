document.addEventListener('DOMContentLoaded', function(){
	// центрирование
	var send = document.getElementById('sendAct');
	var center = document.body.clientWidth / 2 - send.offsetWidth / 2;
	send.style.left = center + 'px';
	var sendChild = send.children;
	for(var i = 0; i < sendChild.length; i++){
		sendChild[i].style.marginLeft = (send.clientWidth / 2 - 10) - sendChild[i].clientWidth / 2 + 'px';
	}
	//расширение текстового поля
	var recipe = document.getElementById('recipe');
	recipe.onmousemove = function(){
		var rmarg = (send.clientWidth / 2 - 10) - recipe.clientWidth / 2;
		if(getComputedStyle(recipe).width >= '233px'){
			if(Math.sign(rmarg) == -1 || Math.sign(rmarg) == -0){
				recipe.style.marginLeft = rmarg - 1.5 + 'px';
			}
			else if(Math.sign(rmarg) == 1 || Math.sign(rmarg) == 0){
				recipe.style.marginLeft = rmarg + 'px';
			}
		}
	}
	recipe.addEventListener('mouseup', function(){
		var rmarg = (send.clientWidth / 2 - 10) - recipe.clientWidth / 2;
		if(getComputedStyle(recipe).width >= '233px'){
			if(Math.sign(rmarg) == -1 || Math.sign(rmarg) == -0){
				recipe.style.marginLeft = rmarg - 1.5 + 'px';
			}
			else if(Math.sign(rmarg) == 1 || Math.sign(rmarg) == 0){
				recipe.style.marginLeft = rmarg + 'px';
			}
		}
	});
	//AJAX-запросы
	var sendAct = document.forms.sendAct;
	var load = sendAct.elements.load;
	sendAct.onsubmit = function(e){
		e.preventDefault();
	}

	load.onmousedown = function(){
		
		var formData = new FormData(document.forms.sendAct);
	
		var xhr = new XMLHttpRequest();
		xhr.open('POST', 'filescript.php');
		xhr.send(formData);
	
		sendAct.elements.recipe_name.value = '';
		sendAct.elements.recipe.value = '';
		document.getElementById('fileformlabel').innerHTML = '';
	}
});
