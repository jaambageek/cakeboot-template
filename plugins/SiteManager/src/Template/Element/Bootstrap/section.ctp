<?php
	/* BOOTSTRAP SECTION TEMPLATE */
	/* NON-BOOTSTRAP OOTB */
	
	if(!empty($help)) {
		echo '<div class="help-box">';
		echo $this->element('help', [
			'element' => 'section',
			'options' => [
				'title' => ['"My Section"','The title of the section.'],
				'body'  => ['"Empty."','The body text displayed in the section.'],
				'id'    => ['false', 'An ID for anchor navigation references']
			]
		]);
	}

	/* INITIALIZE DEFAULTS */
	
	if(!isset($title)) $title = 'My Section';
	if(!isset($body))  $body  = 'Empty.';
	if(!isset($id))    $id    = false;
?>

<?php if($id) echo '<span class="anchor" id="'.$id.'"></span>';?>
<h2><?= $title?></h2>
<p class="lead"><?= $body ?></p>

<?php if(!empty($help)) echo '</div>'; ?>