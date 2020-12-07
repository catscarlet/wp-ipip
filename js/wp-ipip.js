jQuery(document).ready(
    function() {
        var display_style = {
            'display': 'block',
        };

        jQuery('.wp-ipip-link').each(function() {
            var ip = jQuery(this).attr('ip');
            var url = 'https://www.ipip.net/ip/' + ip + '.html';

            jQuery(this).attr('href', url);
            jQuery(this).attr('target', '_blank');
            jQuery(this).attr('rel', 'noreferrer noopener');
        });

        jQuery('.wp-ipip-comment').each(function() {
            var thisId = jQuery(this).attr('id').substr(15);
            var thisIp = jQuery('#wp-ipip-prefix-' + thisId);
            var thisIpMobile = jQuery('#wp-ipip-mobile-prefix-' + thisId);

            thisIp.css(display_style);
            thisIpMobile.css(display_style);

            jQuery('#comment-' + thisId + ' .author.column-author').append(thisIp);
            jQuery('#comment-' + thisId + ' .comment-author').append(thisIpMobile);
        });
    }
);
