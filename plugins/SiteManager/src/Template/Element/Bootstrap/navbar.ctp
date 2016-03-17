<?php

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;
use Cake\View\HelperRegistry;

	/* BOOTSTRAP NAVBAR TEMPLATE */
	
	if(!empty($help)) {
		echo '<div class="help-box">';
		echo $this->element('help', [
			'element' => 'navbar',
			'options' => [
				'class' => ['"default"','Navbar style (<code>"default"</code>, <code>"inverted"</code>).'],
				'fixed' => ['false','Whether or not the navbar is fixed to the top/bottom of the page (<code>"top"</code>, <code>"bottom"</code>).'],
				'fluid' => ['true', 'Whether the navbar should use <code>container-fluid</code> or <code>container</code>'],
				'brand' => ['[\'name\' => \'Brand\']','The brand name and logo (<code>[\'name\' => \'Your Brand\', \'logo\' => \'logo.png\']</code>).'],
				'navs'  => ['[\'nav\' => [\'links\' => [], \'right\' => true, \'show\' => \'all\']]','An array of navs for the navbar. Set <code>right</code> to true to pull a nav to the right.'],
				'links' => ['[\'Link\' => \'/\', \'Link 2\' => \'/\']','The array of links for a nav (used in <code>navs</code> above).'],
				'show'  => ['"all"', 'Whether or not the nav is displayed (<code>"all"</code> = Everyone, <code>"user"</code> = Logged in users, <code>"admin"</code> = Administrators).'],
				'id'    => ['"navbar-collapse-1"', 'ID for collapse button, required if using more than one navbar.']
			]
		]);
	}

	/* INITIALIZE DEFAULTS */
	if(!isset($class)) $class = 'default';
	if(!isset($fixed)) $fixed = false;
	if(!isset($fluid)) $fluid = true;
	if(!isset($brand)) $brand = ['name' => 'Brand'];
	if(!isset($navs))  $navs  = ['nav' => ['links' => ['Link' => '/', 'Link 2' => '/'], 'right' => true, 'show' => 'all']];
	if(!isset($id))    $id    = "navbar-collapse-1";
	
	$this->loadHelper('User');
	
	$user  = $this->User->f_name();
	$admin = $this->User->admin();
?>

<nav class="navbar navbar-<?= $class ?><?php if($fixed) echo ' navbar-fixed-'. $fixed; ?>">
	<div class="container<?php if($fluid) echo '-fluid' ?>">
        	<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header ">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#<?= $id ?>" aria-expanded="false">
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
			<div class="collapse navbar-collapse" id="<?= $id ?>">
				<?php foreach($navs as $nav): ?>
					<?php if(!isset($nav['show'])) $nav['show'] = 'all'; ?>
					<?php if(($nav['show'] == 'all') || (($nav['show'] == 'user') && (!empty($user))) || (!empty($admin))): ?>
						<?php if(empty($nav['dropdown'])): ?>
							<ul class="nav navbar-nav<?php if(isset($nav['right'])) echo ' navbar-right' ?>">
								<?php foreach($nav['links'] as $name => $link): ?>
									<?php
										// CHECK ACTIVE LINK LOGIC
										$active = '';
										// HOME BUTTON
										if(($link == '/') && ($this->request->here == '/') || ($this->request->here == '/production/')) $active = ' class="active"';
										// OTHER
										if(($link != '/') && (strpos($this->request->here, $link) !== false)) $active = ' class="active"';
									?>
									<li<?= $active ?>><a href="<?= $link ?>"><?= $name ?></a></li>
								<?php endforeach; ?>
							</ul>
						<?php else: ?>
							<ul class="nav navbar-nav<?php if(isset($nav['right'])) echo ' navbar-right' ?>">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $nav['dropdown'] ?> <span class="caret"></span></a>
									<ul class="dropdown-menu">
										<?php foreach($nav['links'] as $name => $link): ?>
											<?php if($link == 'divider'): ?>
												<li role="separator" class="divider"></li>
											<?php elseif($link == 'header'): ?>
												<li class="dropdown-header"><?= $name ?></li>
											<?php else: ?>
												<?php
													// CHECK ACTIVE LINK LOGIC
													$active = '';
													// DROPDOWNS
													if(strpos($this->request->here, $link) !== false) $active = ' class="active"';
												?>
												<li<?= $active ?>><a href="<?= $link ?>"><?= $name ?></a></li>
											<?php endif;?>
										<?php endforeach; ?>
									</ul>
								</li>
							</ul>
						<?php endif; ?>
					<?php endif; ?>
				<?php endforeach; ?>
			</div><!-- /.navbar-collapse -->
		<?php endif; ?>
	</div><!-- /.container -->
</nav>
<?php if(!empty($help)) echo '</div>'; ?>
