<?php


class IP
{
    private static $city = null;

    private static function init()
    {
        include_once WP_PLUGIN_DIR.'/wp-ipip/ipipdotnet/ipdb-php/src/ipip/db/City.php';
        include_once WP_PLUGIN_DIR.'/wp-ipip/ipipdotnet/ipdb-php/src/ipip/db/Reader.php';

        self::$city = new ipip\db\City(WP_PLUGIN_DIR.'/wp-ipip/ipipdotnet/ipipfree.ipdb');
    }

    public static function find($ip)
    {

        if (true === empty($ip)) {
            return 'N/A';
        }

        $nip = gethostbyname($ip);

        if (!filter_var($ip, FILTER_VALIDATE_IP)) {
            throw new Exception($ip.' is not a valid IP address');
        }

        if (null === self::$city) {
            self::init();
        }

        return self::$city->find($ip, 'CN');
    }
}
