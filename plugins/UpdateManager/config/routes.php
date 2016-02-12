<?php
use Cake\Routing\Router;

Router::plugin(
    'UpdateManager',
    ['path' => '/update'],
    function ($routes) {
        $routes->fallbacks('DashedRoute');
    }
);
?>