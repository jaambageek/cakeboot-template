<?php
	/* BOOTSTRAP SECTION TEMPLATE */
	/* NON-BOOTSTRAP OOTB */
	
	if(!empty($help)) {
		echo '<div class="help-box">';
		echo $this->element('help', [
			'element' => 'section',
			'options' => [
				'title' => ['"My Section"','The title of the section.'],
				'body'  => ['"Empty."','The body text displayed in the section.']
			]
		]);
	}

	/* INITIALIZE DEFAULTS */
	
	if(!isset($title)) $title = 'My Section';
	if(!isset($body))  $body  = 'Empty.';
?>

<h3><?= $title?></h3>
<p class="lead"><?= $body ?></p>

<?php if(!empty($help)) echo '</div>'; ?>