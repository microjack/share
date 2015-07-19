<?php
/**
 * @author      wangjie
 * @email        1457252084@qq.com
 * @created     2015-05-30 12:45:00
 */
use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\View as View;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;
use Phalcon\Session\Adapter\Files as SessionAdapter;

// DI注册器
$DI = new FactoryDefault();

$DI->setShared('config', $Config);

$DI->setShared('router', $Router);
/**
 * The URL component is used to generate all kind of urls in the application
 */
$DI->set('url', function () use ($Config) {
    $url = new UrlResolver();
    // $url->setBaseUri('/tutorial/');
    return $url;
}, true);

/**
 * Setting up the view component
 */
$DI->set('view', function(){
        $view = new View();
        $view->setViewsDir(ROOT_PATH.'/Template');
        return $view;
});