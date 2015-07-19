<?php
/**
 * @author      wangjie
 * @email        1457252084@qq.com
 * @created     2015-05-30 12:45:00
 */
$Config->merge(array(
	'avatar' => array(
		'width' => 200,
		'height' => 200,
		'url' => 'http://share.cc'
	)
));

$Loader->registerNamespaces(array(
	'Web' => ROOT_PATH
),true);

$Loader->register();