<?php
	/* BOOTSTRAP STATIC INPUT TEMPLATE */
	/* NON-BOOTSTRAP OOTB */
	
	if(!empty($help)) {
		echo '<div class="help-box">';
		echo $this->element('help', [
			'element' => 'static_input',
			'options' => [
				'title' => ['"Static"','The title of the input.'],
				'value' => ['"Empty."','The value text displayed in the input.']
			]
		]);
	}

	/* INITIALIZE DEFAULTS */
	
	if(!isset($title)) $title = 'Static';
	if(!isset($value)) $value = 'Empty.';
?>

<div class="form-group">
    <label class="control-label"><?= $title ?></label>
    <p class="form-control-static"><?= $value ?></p>
</div>

<?php if(!empty($help)) echo '</div>'; ?>