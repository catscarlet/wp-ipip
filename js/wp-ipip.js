jQuery(document).ready(
    function() {
        var style = {
            'text-decoration': 'none',
            'color': '#0073aa',
            'cursor': 'pointer',
        };
        var style_on_mouseenter = {
            'color': '#00a0d2',
        };
        var style_on_mouseleave = {
            'color': '#0073aa',
        };

        var display_style = {
            'display': 'block',
        };

        jQuery('.wp-ipip-link-span').each(function() {
            var ip = jQuery(this).attr('ip');
            var url = 'https://www.ipip.net/ip/' + ip + '.html';

            jQuery(this).css(style);

            jQuery(this).hover(function() {
                jQuery(this).css(style_on_mouseenter);
            }, function() {
                jQuery(this).css(style_on_mouseleave);
            });

            jQuery(this).click(function() {
                var win = window.open(url, '_blank');
                if (win) {
                    //Browser has allowed it to be opened
                    win.focus();
                } else {
                    //Browser has blocked it
                    alert('Please allow popups for this website');
                }
            });

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
