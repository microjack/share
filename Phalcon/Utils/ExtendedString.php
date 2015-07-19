<?php
/**
 * @author      wangjie
 * @email        1457252084@qq.com
 * @created     2015-05-30 12:41:04
 */

namespace Phalcon\Utils;

class ExtendedString
{
    //Alphabet array
    public static $alphabet = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
    
    //Generate unique strings
    public static function rand() {
    	$n = strval(microtime(true)*10000);
	$chars = self::$alphabet;
	$chars[] = $n{10};
	$chars[] = $n{11};
	$chars[] = $n{12};
	$chars[] = $n{13};
	shuffle($chars);
	$prefix = implode('', $chars);
	$uniqid = uniqid($prefix);
	return md5($uniqid);
    }
}