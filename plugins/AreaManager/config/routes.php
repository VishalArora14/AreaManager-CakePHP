<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;
use Cake\Http\Middleware\CsrfProtectionMiddleware;

Router::plugin(
    'AreaManager',
    ['path' => '/areamanager'],
    function (RouteBuilder $routes) {
        $routes->fallbacks(DashedRoute::class);

        // $routes->registerMiddleware('csrf', new CsrfProtectionMiddleware([
        //     'httpOnly' => true,
        // ]));
        // $routes->applyMiddleware('csrf');

        //Area Level Routes
        
        $routes->connect('/arealevel', ['controller' => 'AreaLevel', 'action' => 'getallarealevel']);
        $routes->connect('/arealevel/add', ['controller' => 'AreaLevel', 'action' => 'add']);
        $routes->connect('/arealevel/save', ['controller' => 'AreaLevel', 'action' => 'save']);
        $routes->connect('/arealevel/getallarealevel', ['controller' => 'AreaLevel', 'action' => 'getallarealevel']);
        
        $routes->connect('/arealevel/edit/:id', ['controller' => 'AreaLevel', 'action' => 'edit'])
        ->setPass(['id'])
        ->setPatterns(['id' => '\d+'])
        ;

        // '\d+' is used for entering only numeric data

        $routes->connect('/arealevel/delete/:id', ['controller' => 'AreaLevel', 'action' => 'delete'])
        ->setPass(['id'])
        ->setPatterns(['id' => '\d+']);
        ;


        //Area Routes

        $routes->connect('/area', ['controller' => 'Area', 'action' => 'index']);
        $routes->connect('/area/add', ['controller' => 'Area', 'action' => 'add']);
        $routes->connect('/area/add/:id', ['controller' => 'Area', 'action' => 'add'])        
        ->setPass(['id'])
        ->setPatterns(['id' => '\d+']);;
        
        $routes->connect('/area/save', ['controller' => 'Area', 'action' => 'save']);
        $routes->connect('/area/getallarea', ['controller' => 'Area', 'action' => 'getallarea']);
        
        $routes->connect('/area/edit/:id', ['controller' => 'Area', 'action' => 'edit'])
        ->setPass(['id'])
        ->setPatterns(['id' => '\d+']);

        $routes->connect('/area/delete/:id', ['controller' => 'Area', 'action' => 'delete'])
        ->setPass(['id'])
        ->setPatterns(['id' => '\d+']);
        ;
    }
); 
