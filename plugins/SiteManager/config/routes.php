<?php
use Cake\Routing\Router;

Router::plugin(
    'SiteManager',
    ['path' => '/sitemgr'],
    function ($routes) {
        $routes->fallbacks('DashedRoute');
		$routes->extensions(['json']);
    	$routes->resources('Artifacts');
    }
);
?>
