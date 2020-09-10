$(document).ready(function() {
	$('.upvote-link, .downvote-link').on('click', function(e) {
		e.stopPropagation();
		
		console.log('vote click');
	});
	$('.post').on('click', function() {
		console.log('post click');
	});
});