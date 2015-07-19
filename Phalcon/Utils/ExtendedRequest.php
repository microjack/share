<?php
/**
 * @author      wangjie
 * @email        1457252084@qq.com
 * @created     2015-05-31 17:08:30
 */
namespace Phalcon\Utils;

class ExtendedRequest
{    
    //Raw Data
    public static function raw()
    {
        return file_get_contents("php://input");
    }

    //URL Format
    public static function urlFormat($url)
    {
        $search = array('%21', '%2A','%3B', '%3A', '%40', '%26', '%3D', '%2B', '%24', '%2C', '%2F', '%3F', '%25', '%23', '%5B', '%5D');
        $replace = array('!', '*', ';', ":", "@", "&", "=", "+", "$", ",", "/", "?", "%", "#", "[", "]");
        return str_replace($search, $replace, $url);
    }

    //Mobile Access
    public static function fromMobile()
    {
        if (self::fromAndroid() || self::fromIOS()) {
            return true;
        }
        return false;
    }

    //Android Client
    public static function fromAndroid()
    {
        return strpos(self::get_userAgent(),'android');
    }

    //Iphone Client
    public static function fromIphone()
    {
        return strpos(self::get_userAgent(),'iphone');
    }

    //Weixin Access
    public static function fromWeixin()
    {
        return strpos(self::get_userAgent(),'micromessenger');
    }

    //Weibo Access
    public static function fromWeibo()
    {
        return strpos(self::get_userAgent(),'weibo');
    }

    //Get UserAgent
    public static function get_userAgent() {
        return strtolower($_SERVER['HTTP_USER_AGENT']);
    }

    //Access to the real IP address
    public static function real_ip() {
        $ip = $_SERVER['REMOTE_ADDR'];
        if (isset($_SERVER['HTTP_CLIENT_IP']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_CLIENT_IP'])) {
        	$ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && preg_match_all('#\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}#s', $_SERVER['HTTP_X_FORWARDED_FOR'], $matches)) {
        	foreach ($matches[0] as $xip) {
                if (!preg_match('#^(10|172\.16|192\.168)\.#', $xip)) {
                    $ip = $xip;
                    break;
                }
        	}
        }
        return $ip;
    }
}