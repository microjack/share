<?php
/**
 * @author      wangjie
 * @email        1457252084@qq.com
 * @created     2015-05-30 12:45:00
 */
define('ROOT_PATH', __DIR__);
try {
    // 加载公共配置
    include dirname(ROOT_PATH).'/Phalcon/Config/Config.php';

    // 加载站点配置
    include ROOT_PATH.'/Config/Config.php';
    
    // 加载路由配置
    include ROOT_PATH.'/Config/Router.php';

    // 加载项目服务
    include ROOT_PATH.'/Config/Service.php';

    $application = new \Phalcon\Mvc\Application($DI);
    
    echo $application->handle()->getContent();
} catch(\Exception $e) {
     echo "PhalconException: ", $e->getMessage();
}