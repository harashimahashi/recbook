document.addEventListener('DOMContentLoaded', function(){
	document.getElementsByTagName('header')[0].style.width = document.body.clientWidth - 10 + 'px';
	var types = document.getElementById('types');
	types.style.marginLeft = types.parentNode.clientWidth / 2 - types.clientWidth / 2 + 'px';
});