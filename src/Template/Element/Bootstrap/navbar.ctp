<?php

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

	/* BOOTSTRAP NAVBAR TEMPLATE */
	
	if(!empty($help)) {
		echo '<div class="help-box">';
		echo $this->element('help', [
			'element' => 'navbar',
			'options' => [
				'class' => ['"default"','Navbar style (<code>"default"</code>, <code>"inverted"</code>).'],
				'fixed' => ['false','Whether or not the navbar is fixed to the top/bottom of the page (<code>"top"</code>, <code>"bottom"</code>).'],
				'brand' => ['[\'name\' => \'Brand\']','The brand name and logo (<code>[\'name\' => \'Your Brand\', \'logo\' => \'logo.png\']</code>).'],
				'navs'  => ['[\'nav\' => [\'links\' => [], \'right\' => true, \'debug\' => false]]','An array of navs for the navbar. Set <code>right</code> to true to pull a nav to the right.'],
				'links' => ['[\'Link\' => \'/\', \'Link 2\' => \'/\']','The array of links for a nav (used in <code>navs</code> above).']
			]
		]);
	}

	/* INITIALIZE DEFAULTS */
	
	if(!isset($class)) $class = 'default';
	if(!isset($fixed)) $fixed = false;
	if(!isset($brand)) $brand = ['name' => 'Brand'];
	if(!isset($navs))  $navs  = ['nav' => ['links' => ['Link' => '/', 'Link 2' => '/'], 'right' => true, 'debug' => false]];
?>

<nav class="navbar navbar-<?= $class ?><?php if($fixed) echo ' navbar-fixed-'. $fixed; ?>">
	<div class="container-fluid">
        	<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header ">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<?php if($brand): ?>
				<?php if(isset($brand['logo'])): ?>
					<a class="navbar-brand" href="/"><?= $this->Html->image($brand['logo'], ['alt' => 'Logo']); ?></a>
				<?php endif; ?>
				<?php if(isset($brand['name'])): ?>
					<a class="navbar-brand" href="/"><?= $brand['name'] ?></a>
				<?php endif; ?>
			<?php endif; ?>
		</div>
		
		<?php if($navs): ?>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="navbar-collapse-1">
				<?php foreach($navs as $nav): ?>
					<?php if((empty($nav['debug'])) || (Configure::read('debug'))): ?>
						<?php if(empty($nav['dropdown'])): ?>
							<ul class="nav navbar-nav<?php if(isset($nav['right'])) echo ' navbar-right' ?>">
								<?php foreach($nav['links'] as $name => $link): ?>
									<li><a href="<?= $link ?>"><?= $name ?></a></li>
								<?php endforeach; ?>
							</ul>
						<?php else: ?>
							<ul class="nav navbar-nav<?php if(isset($nav['right'])) echo ' navbar-right' ?>">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $nav['dropdown'] ?> <span class="caret"></span></a>
									<ul class="dropdown-menu">
										<?php foreach($nav['links'] as $name => $link): ?>
											<li><a href="<?= $link ?>"><?= $name ?></a></li>
										<?php endforeach; ?>
									</ul>
								</li>
							</ul>
						<?php endif; ?>
					<?php endif; ?>
				<?php endforeach; ?>
			</div><!-- /.navbar-collapse -->
		<?php endif; ?>
	</div><!-- /.container-fluid -->
</nav>

<?php if(!empty($help)) echo '</div>'; ?>