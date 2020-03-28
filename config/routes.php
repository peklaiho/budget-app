<?php

use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

/** @var \Cake\Routing\RouteBuilder $routes */
$routes->setRouteClass(DashedRoute::class);

$routes->scope('/', function (RouteBuilder $builder) {
    // Register scoped middleware for in scopes.
    $builder->registerMiddleware('csrf', new CsrfProtectionMiddleware([
        'httpOnly' => true,
    ]));
    $builder->applyMiddleware('csrf');

    $builder->connect('/', ['controller' => 'Home', 'action' => 'index']);

    $builder->connect('/expenses', ['controller' => 'Expenses', 'action' => 'index']);
    $builder->connect('/expense/add', ['controller' => 'Expenses', 'action' => 'add']);
    $builder->connect('/expense/edit/*', ['controller' => 'Expenses', 'action' => 'edit']);

    $builder->connect('/income', ['controller' => 'Incomes', 'action' => 'index']);
    $builder->connect('/income/add', ['controller' => 'Incomes', 'action' => 'add']);
    $builder->connect('/income/edit/*', ['controller' => 'Incomes', 'action' => 'edit']);
});
