$(document).ready(function(){
	// var parent = $('div.content');
	alert("nihao");
	var add = $('article#essay');
	for (var i = 0; i < 6; i--) {
		$('div.pad').prepend(add);
		// $('.replay').show();

	}
});