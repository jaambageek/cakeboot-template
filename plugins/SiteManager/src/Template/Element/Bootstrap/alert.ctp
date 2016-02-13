<?php
	/* BOOTSTRAP ALERT TEMPLATE */
	
	if(!empty($help)) {
		echo '<div class="help-box">';
		echo $this->element('help', [
			'element' => 'alert',
			'options' => [
				'dismissible' => ['true','Whether or not the alert can be closed by the user.'],
				'class'       => ['"info"','The alert style (<code>"success"</code>, <code>"info"</code>, <code>"warning"</code>, <code>"danger"<code>).'],
				'title'       => ['{class}','The title of the alert. First letter will be capitalized.'],
				'message'     => ['"No detail provided."','The message displayed in the alert.']
			]
		]);
	}

	/* INITIALIZE DEFAULTS */
	
	if(!isset($dismissible)) $dismissible = true;
	if(!isset($class)) $class = 'info';
	if(!isset($title)) $title = $class;
	if(!isset($message)) $message = 'No detail provided.';
?>

<div class="alert alert-<?= $class ?> <?php if($dismissible) echo 'alert-dismissible' ?>" role="alert">
  <?php if($dismissible):?>
  	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <?php endif;?>
  <strong><?= ucfirst($title)?>!</strong> <?= $message ?>
</div>

<?php if(!empty($help)) echo '</div>'; ?>