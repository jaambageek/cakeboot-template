<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Cake3Template';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('SiteManager.bootstrap.min') ?>
    <?= $this->Html->css('SiteManager.font-awesome.min') ?>
    <?= $this->Html->css('overrides.css') ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
	<?= $this->element('SiteManager.Bootstrap/modal'); ?>
	<?php
    $user_nav = $this->SiteManager->user_nav();
    $sitemgr_nav = $this->SiteManager->sitemgr_nav();

		$navs = [
			'nav1' => [
				'links' => ['Link' => '/']
			],
      'user_nav' => $user_nav,
			'sitemgr_nav' => $sitemgr_nav
		];

		$brand = [
			'name' => 'Cake 3 Template',
			'logo' => 'logo.png'
		];
	?>
	<?= $this->element('SiteManager.Bootstrap/navbar', ['navs' => $navs, 'fixed' => 'top', 'brand' => $brand]); ?>
	<div class="container-fluid clearfix">
		<?= $this->Flash->render() ?>
		<?= $this->fetch('content') ?>
	</div>
	<footer>
	</footer>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<?= $this->Html->script('SiteManager.bootstrap.min') ?>
</body>
</html>
