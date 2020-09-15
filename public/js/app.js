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
		var data = {
			up: up,
			_token: csrfToken
		}
		var url;
		if ($(this).parent().parent().hasClass('comment')) {
			data.commentId = $(this).parent().parent().data('commentid');
			url = voteCommentUrl
		} else {
			data.postId = $(this).parent().parent().parent().data('postid');
			url = votePostUrl;
		}
		$.ajax({
			method: "POST",
			url: url,
			data: data
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

	$('.reply-btn').on('click', function () {
		console.log('asd');
		var replyBlock = $(this).parent().find('.reply');
		if (replyBlock.hasClass('d-none')) {
			replyBlock.removeClass('d-none');
		} else {
			replyBlock.addClass('d-none');
		}
	});
});