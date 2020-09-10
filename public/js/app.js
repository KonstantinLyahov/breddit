$(document).ready(function () {
	if (performance.navigation.type == 2) {
		location.reload();
	}
	$('.upvote-link, .downvote-link').on('click', function (e) {
		e.stopPropagation();
		var up = true;
		if ($(this).hasClass('downvote-link')) {
			up = false;
		}
		var postId = $(this).parent().parent().parent().data('postid');
		$.ajax({
			method: "POST",
			url: votePostUrl,
			data: {
				postId: postId,
				up: up,
				_token: csrfToken
			}
		})
			.done((response) => {
				var action = response.action;
				var voteSection = $(this).parent();
				voteSection.removeClass('upvoted');
				voteSection.removeClass('downvoted');
				if (action == 'deleted') {
					if (up) {
						voteSection.find('div').text(parseInt(voteSection.find('div').text()) - 1);
					} else {
						voteSection.find('div').text(parseInt(voteSection.find('div').text()) + 1);
					}
					return;
				}
				if (action == 'updated') {
					if (up) {
						voteSection.addClass('upvoted');
						voteSection.find('div').text(parseInt(voteSection.find('div').text()) + 2);
					} else {
						voteSection.addClass('downvoted');
						voteSection.find('div').text(parseInt(voteSection.find('div').text()) - 2);
					}
					return;
				}
				if (up) {
					voteSection.addClass('upvoted');
					voteSection.find('div').text(parseInt(voteSection.find('div').text()) + 1);
				} else {
					voteSection.addClass('downvoted');
					voteSection.find('div').text(parseInt(voteSection.find('div').text()) - 1);
				}
			});
	});

	$('.post-box').on('click', function () {
		location.href = getPostUrl + '/' + $(this).find('.post').data('postid');
	});
});