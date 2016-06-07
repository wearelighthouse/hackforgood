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

                $routes->connect('/register', [
                    'controller' => 'HomeOwners',
                    'action' => 'add'
                ]);

                $routes->connect('/:id/assessment', [
                    'controller' => 'HomeOwners',
                    'action' => 'assessment'
                ], [
                    'pass' => ['id']
                ]);

                $routes->connect('/:id/sign', [
                    'controller' => 'HomeOwners',
                    'action' => 'sign'
                ], [
                    'pass' => ['id']
                ]);
            });
        }
    );
});

Plugin::routes();
