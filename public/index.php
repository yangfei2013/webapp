<?php
    
use Phalcon\Loader;
use Phalcon\Tag;
use Phalcon\Mvc\Url;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Application;
use Phalcon\DI\FactoryDefault;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;

try{
    $loader = new Loader();

    $loader->registerDirs(
           array(
             '../app/controllers/',
             '../app/models/'
            )
    )->register();

    $di = new FactoryDefault();
    $di['db'] = function(){
        return new DbAdapter(array(
            'host' => '127.0.0.1',
            'username' => 'root',
            'password' => 'root',
            'dbname' => 'webapp' 
        ));
    };
    
    $di['view'] = function(){
        $view = new View();
        $view->setViewsDir('../app/views/');
        return $view;
    };

    $di['url'] = function(){
        $url = new Url();
        $url->setBaseUri('/webapp/');
        return $url;
    };

    $di['tag'] = function(){
        return new Tag();
    };

    $application = new Application($di);
    echo $application->handle()->getContent();


}catch(Exception $e){
    echo "Exception: ", $e->getMessage();
}

