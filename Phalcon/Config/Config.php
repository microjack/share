<?php
/**
 * @author      wangjie
 * @email        1457252084@qq.com
 * @created     2015-05-30 12:41:04
 */

define('PHALCON_PATH', dirname(__DIR__));
header("Content-Type: text/html; charset=UTF-8");

$Config = (new \Phalcon\Config\Adapter\Ini(__DIR__.'/Config.ini'));
$Config->merge(array(
	'avatar' => array(
		'width' => 200,
		'height' => 200,
		'url' => 'http://share.cc/'
	)
));

$Loader = new \Phalcon\Loader();
$Loader->registerNamespaces(array(
	'Phalcon' => PHALCON_PATH
));