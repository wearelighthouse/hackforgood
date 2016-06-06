<?php

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::defaultRouteClass('DashedRoute');

Router::scope('/', function (RouteBuilder $routes) {

    $routes->connect('/', [
        'controller' => 'Home',
        'action' => 'display'
    ]);

    $routes->connect('/login', [
        'controller' => 'Users',
        'action' => 'login'
    ]);

    $routes->connect('/logout', [
        'controller' => 'Users',
        'action' => 'logout'
    ]);
});

Plugin::routes();
