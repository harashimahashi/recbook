document.addEventListener('DOMContentLoaded', function(){
	
	document.addEventListener('click', function(e){
		var target = e.target;
		if(!target.classList.contains('file')) return;
		var filename = target.innerHTML;
		document.location.href = url.slice(0, index(url)) + '?f_name=' + filename;
	});
	
	var getAbsoluteUrl = (function() {
		var a;

		return function(url) {
			if(!a) a = document.createElement('a');
			a.href = url;

			return a.href;
		};
	})();

	var url = getAbsoluteUrl('');
	
	function index(url){
		if(url.indexOf('?') == -1){
			return url.indexOf('?') + 1;
		}
		else{
			return url.indexOf('?');
		}
	}
});