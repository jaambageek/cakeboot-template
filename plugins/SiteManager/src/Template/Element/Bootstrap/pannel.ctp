<?php
	/* BOOTSTRAP PANNEL TEMPLATE */
	
	if(!empty($help)) {
		echo '<div class="help-box">';
		echo $this->element('help', [
			'element' => 'pannel',
			'options' => [
				'class' => ['"default"','The pannel style (<code>"primary"</code>, <code>"success"</code>, <code>"info"</code>, <code>"warning"</code>, <code>"danger"<code>).'],
				'title' => ['false','The title of the pannel.'],
				'body'  => ['"Empty."','The body text displayed in the pannel.']
			]
		]);
	}

	/* INITIALIZE DEFAULTS */
	
	if(!isset($class)) $class = 'default';
	if(!isset($title)) $title = false;
	if(!isset($body))  $body  = 'Empty.';
?>

<div class="panel panel-<?= $class ?>">
	<?php if(!empty($title)): ?>
		<div class="panel-heading">
			<h3 class="panel-title"><?= $title?></h3>
		</div>
	<?php endif; ?>
	<div class="panel-body">
		<?= $body ?>
	</div>
</div>

<?php if(!empty($help)) echo '</div>'; ?>