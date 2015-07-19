<?php
/**
 * @author      wangjie
 * @email        1457252084@qq.com
 * @created     2015-05-30 12:45:00
 */
namespace Admin\Controller;
use Admin\Controller\BaseController as Controller;

class IndexController extends Controller {
	public function indexAction(){
		echo "index";
	}

	public function defaultAction(){
		echo "default";
	}
}