$(function () {
  $("#add-comment").on('beforeSubmit', function (event) {
    var form = $(this);
    $.post(form.attr('action'), form.serialize())
            .done(function (data) {
              clear_comments_field();
              load_comments(postId);
            })
            .fail(function () {
              alert('Failed to add comment');
            })
    return false;
  })
  load_comments(postId);
});

function load_comments(post) {
  $.get(baseUrl + '/comments/' + post, function (data) {
    $("#comments_container").html(data);
  });
}

function clear_comments_field() {
  console.log('clearing comments');
  $("#comment-author").val('');
  $("#comment-content").val('');
}