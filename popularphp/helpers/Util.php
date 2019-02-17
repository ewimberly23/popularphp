<?php

namespace app\helpers;

/**
 * A wrapper for useful functions
 *
 * @author Evan Wimberly <ewimberly23@gmail.com>
 */
class Util
{
    /**
     * Make a mysql frinedly datetime from string
     * @param string $str
     * @return string
     */
    public static function makeMysqlFriendlyDate(string $str) {
        return date("Y-m-d H:i:s", strtotime($str));
    }
}
