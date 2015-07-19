<?php
/**
 * @author      wangjie
 * @email        1457252084@qq.com
 * @created     2015-07-19 09:45:50
 */
namespace Phalcon\Utils;

class ExtendedAttachment 
{
    //日期分割模式
    public static function dateFormat()
    {
    	return date('Y/m/d/');
    }

    //11位数字分割模式
    public static function numFormat($num)
    {
    	$num = abs(intval($num));
	$num = sprintf("%011d", $num);
	$dir1  = substr($num, 0, 3);
	$dir2  = substr($num, 3, 3);
	$dir3  = substr($num, 6, 3);
	$dir4  = substr($num, -2);
	return $dir1.'/'.$dir2.'/'.$dir3.'/'.$dir4.'/';
    }
    
}
