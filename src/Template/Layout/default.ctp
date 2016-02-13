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

    <?= $this->Html->css('bootstrap.min.css') ?>
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
	<div class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content" id="theModal">
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<?php
		$navs = [
			'nav1' => [
				'links' => ['Link' => '/']
			],
			'nav2' => [
				'links' => [
					'Deliver' => '/update/files',
          'Tables' => '/update/tables',
					'Read Me' => '/pages/readme',
					'Cake Status' => '/pages/cake_status'
				],
				'right' => true,
				'debug' => true
			],
			'nav3' => [
				'links' => [
					'Bootstrap Editor' => '/bootstrap-toolkit/bsPalettes/index',
					'Bootstrap Help' => '/bootstrap-toolkit/pages/bootstrapHelp',
					'Icons' => '/bootstrap-toolkit/icons'
				],
				'dropdown' => 'Bootstrap',
				'right' => true,
				'debug' => true
			]
		];

		$brand = [
			'name' => 'Cake 3 Template',
			'logo' => 'logo.png'
		];
	?>
	<?= $this->element('Bootstrap/navbar', ['navs' => $navs, 'fixed' => 'top', 'brand' => $brand]); ?>
	<div class="container-fluid clearfix">
		<?= $this->Flash->render() ?>
		<?= $this->fetch('content') ?>
	</div>
	<footer>
	</footer>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<?= $this->Html->script('bootstrap.min.js') ?>
</body>
</html>
