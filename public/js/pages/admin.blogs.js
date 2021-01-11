$(document).on('click', '[data-action="publishBlog"]', function() {
    var url = $(this).data('url');
    var jQListItem = $(this).parents('.list-group-item');
    $.ajax(url)
        .then(function (data) {
            jQListItem.replaceWith(data);
        });
});