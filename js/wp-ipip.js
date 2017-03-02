jQuery(function($) {
    $('.wp-ipip-test').each(function() {
        var thisId = $(this).attr('commentid');
        $(this).insertAfter('#comment-' + thisId + ' .author :last').show();
    });
});

console.log('loading wp-ipip.js');
