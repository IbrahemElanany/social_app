require('./bootstrap');


import Echo from "laravel-echo"

window.io = require('socket.io-client');

window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: window.location.hostname + ':6001'
});

let onlineUsersLength = 0;
window.Echo.join(`online`)
    $('#comment').on('click',function(e){
        e.preventDefault();
        let body = $('#comment-text').val();
    	let post_id = $('#comment-text').data('post');
    	let data = {
    		'_token' :$('meta[name=csrf-token]').attr('content'),
    		'user_id' : $('meta[name=user-id]').attr('content'),
            'post_id' : post_id,
            'body' : body
    	}
    	$('#comment-text').val('');
    	$.ajax({
    		url : "/comments/create",
    		method : 'post',
    		data : data,
            success:function(response){
                toastr.success(response);
            },
            error:function(response){
                toastr.error(response);
            }
    	})
    });

window.Echo.channel('post-comments')
.listen('CommentEvent', (e) => {
    console.log(e.comment.comment);
    $('#comment-container').append(`
        <hr>
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">${e.comment.user_id}</h5>
            ${e.comment.comment}
          </div>
        </div>
    `);
});
