<?php
	/* BOOTSTRAP CALLOUT TEMPLATE */
	/* NON-BOOTSTRAP OOTB */
	
	if(!empty($help)) {
		echo '<div class="help-box">';
		echo $this->element('help', [
			'element' => 'callout',
			'options' => [
				'class' => ['"default"','The callout style (<code>"default"</code>, <code>"primary"</code>, <code>"success"</code>, <code>"info"</code>, <code>"warning"</code>, <code>"danger"<code>).'],
				'title' => ['false','The title of the callout.'],
				'body'  => ['"Empty."','The body text displayed in the callout.']
			]
		]);
	}

	/* INITIALIZE DEFAULTS */
	
	if(!isset($class)) $class = 'default';
	if(!isset($title)) $title = false;
	if(!isset($body))  $body  = 'Empty.';
?>

<div class="bs-callout bs-callout-<?= $class ?>">
	<?php if(!empty($title)): ?>
		<h4><?= $title?></h4>
	<?php endif; ?>
	<?= $body ?>
</div>

<?php if(!empty($help)) echo '</div>'; ?>