<?php
use Cake\Routing\Router;

Router::plugin(
    'BootstrapToolkit',
    ['path' => '/bootstrap-toolkit'],
    function ($routes) {
        $routes->fallbacks('DashedRoute');
    }
);
?>