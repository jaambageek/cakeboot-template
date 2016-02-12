<?php
/**
 * Bootstrap Palettes v0.1
 * http://www.vallierebrothers.com/BootstrapPalettes
 *
 * Copyright 2016, Stephen Valliere <info@vallierebrothers.com>
 * Licensed under MIT or GPLv3, see LICENSE
 */

	namespace BootstrapToolkit\Controller;

	use App\Controller\AppController as BaseController;

	class AppController extends BaseController {
		parent::initialize();
		
		  // INCLUDE THE LESS HELPER FOR COMPILING LESS ON THE FLY
		/*public $helpers = array(
			'Less' => array('className' => 'BootstrapToolkit.Less')
		);*/
	}
?>