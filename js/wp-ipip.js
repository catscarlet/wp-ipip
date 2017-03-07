jQuery(function($) {
    $('.wp-ipip-comment').each(function() {
        var thisId = $(this).attr('id').substr(15);
        $(this).insertAfter('#comment-' + thisId + ' .author :last').show();
    });
});

