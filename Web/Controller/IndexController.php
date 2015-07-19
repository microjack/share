<?php
/**
 * @author      wangjie
 * @email        1457252084@qq.com
 * @created     2015-05-30 12:45:00
 */
namespace Web\Controller;
use Web\Controller\BaseController as Controller;

class IndexController extends Controller {
	public function indexAction(){
		// echo \Phalcon\Utils\ExtendedString::rand();
		echo \Phalcon\Utils\ExtendedAttachment::numFormat(234);
	}

	public function defaultAction(){
		echo "default";
	}
}