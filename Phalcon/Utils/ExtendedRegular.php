<?php
/**
 * @author      wangjie
 * @email        1457252084@qq.com
 * @created     2015-06-12 09:16:30
 */

namespace Phalcon\Utils;

class ExtendedRegular
{
	//姓名
	public static $name;

	//年龄
	public static $age;

	//邮箱
	public static $email;

	//手机号
	public static $phone;

	//网址
	public static $website;

	//过滤标签属性
	public static function removeAttributes($tag) {
                    return "#<\s*{$tag}[^>]*>#i";
	}

	//获取标签属性($1)
	public static function fetchAttribute($tag,$attribute) {
	    return "#<\s*{$tag}.*?{$attribute}=[\'\"]?([^\'\"]*).*[\'\"\s]?#i";
	}
}