<?php

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::defaultRouteClass('DashedRoute');

Router::scope('/', function ($routes) {

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

    $routes->resources(
        'Operations',
        ['only' => ''],
        function ($routes) {
            $routes->scope('/home-owners', function ($routes) {
                $routes->connect('/', [
                    'controller' => 'HomeOwners',
                    'action' => 'index'
                ]);

                $routes->connect('/add', [
                    'controller' => 'HomeOwners',
                    'action' => 'add'
                ]);

                $routes->connect('/:id', [
                    'controller' => 'HomeOwners',
                    'action' => 'edit'
                ], [
                    'pass' => ['id']
                ]);
            });
        }
    );
});

Plugin::routes();
