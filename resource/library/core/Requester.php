<?php

/*
 * Accept Requests from clients
 */

/**
 * Static Requestor
 *
 * @author dcai
 */
class Requestor {

    private static $_uri = array(); //from url
    private static $_data = array(); //from post
    private static $_query = array(); //from get
    private static $_initialized = false;

    private static function _init() {
        if (self::$_initialized) {
            return;
        }

        self::$_uri = self::_read_uri();
        self::$_data = self::_read_data();
        self::$_query = self::_read_query();
    }

    public static function get_uri() {
        self::_init();
        return self::$_uri;
    }

    public static function get_data() {
        self::_init();
        return self::$_data;
    }

    public static function get_query() {
        self::_init();
        return self::$_query;
    }

    /**
     * modified from cakephp's version to get uri.
     * 
     * @return str;
     */
    private static function _read_uri() {
        if (!empty($_SERVER['PATH_INFO'])) {
            return $_SERVER['PATH_INFO'];
        } elseif (isset($_SERVER['REQUEST_URI'])) {
            $uri = $_SERVER['REQUEST_URI'];
        } elseif (isset($_SERVER['PHP_SELF']) && isset($_SERVER['SCRIPT_NAME'])) {
            $uri = str_replace($_SERVER['SCRIPT_NAME'], '', $_SERVER['PHP_SELF']);
        } elseif (isset($_SERVER['HTTP_X_REWRITE_URL'])) {
            $uri = $_SERVER['HTTP_X_REWRITE_URL'];
        } elseif ($var = env('argv')) {
            $uri = $var[0];
        }

        $base = SITE_BASE_URL;

        if (strlen($base) > 0 && strpos($uri, $base) === 0) {
            $uri = substr($uri, strlen($base));
        }
        if (strpos($uri, '?') !== false) {
            list($uri) = explode('?', $uri, 2);
        }
        if (empty($uri) || $uri == '/' || $uri == '//') {
            $uri = '/';
        }

        //trim both "/" around, e.g. return "page/1" instead of "/page/1/"
        $uri = trim($uri, "/");

        return $uri;
    }

    //stripslashes when there is magic_quotes
    private static function _read_data() {
        if (get_magic_quotes_gpc()) {

            function stripslashes_gpc(&$value) {
                $value = stripslashes($value);
            }

            array_walk_recursive($_GET, 'stripslashes_gpc');
        }
        return $_POST;
    }

    //stripslashes when there is magic_quotes
    private static function _read_query() {
        if (get_magic_quotes_gpc()) {

            function stripslashes_gpc(&$value) {
                $value = stripslashes($value);
            }

            array_walk_recursive($_GET, 'stripslashes_gpc');
        }
        return $_GET;
    }

}
