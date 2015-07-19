<?php
/**
 * @author      wangjie
 * @email        1457252084@qq.com
 * @created     2015-05-30 12:45:00
 */
use Phalcon\Mvc\Router;

// Create the router
$Router = new Router();

//Define a route
$Router->setDefaultNamespace('Web\Controller');
$Router->setDefaultController('index');
$Router->setDefaultAction('default');