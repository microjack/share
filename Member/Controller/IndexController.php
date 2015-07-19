<?php
/**
 * @author      wangjie
 * @email        1457252084@qq.com
 * @created     2015-05-30 12:45:00
 */
namespace Member\Controller;
use Member\Controller\BaseController as Controller;

class IndexController extends Controller {
	public function indexAction(){
		var_dump( \Phalcon\Utils\ExtendedRequest::fromAndroid() );
	}

	public function defaultAction(){
		echo "default";
	}
}