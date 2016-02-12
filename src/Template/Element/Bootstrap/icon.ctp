<?php
	/* BOOTSTRAP ICON TEMPLATE */
	
	if(!empty($help)) {
		echo '<div class="help-box">';
		echo $this->element('help', [
			'element' => 'icon',
			'options' => [
				'icon' => ['"question-sign"','The icon to display. Icon list can be found <a href="http://getbootstrap.com/components/#glyphicons">here</a>']
			]
		]);
	}

	/* INITIALIZE DEFAULTS */
	
	if(!isset($icon)) $icon = 'question-sign';
?>

<span class="glyphicon glyphicon-<?= $icon ?>" aria-hidden="true"></span>

<?php if(!empty($help)) echo '</div>'; ?>