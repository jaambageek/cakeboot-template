<?php
	/* BOOTSTRAP PANNEL TEMPLATE */
	
	if(!empty($help)) {
		echo '<div class="help-box">';
		echo $this->element('help', [
			'element' => 'media_object',
			'options' => [
				'right'    => ['false','Put the image on the right side.'],
				'vertical' => ['"top"', 'The vertical alignment of the image. Can be <code>top</code>, <code>middle</code>, or <code>bottom</code>.'],
				'title'    => ['false','The title of the Media Object.'],
				'body'     => ['"Empty."','The body text displayed in the Media Object.'],
				'path'     => ['""', 'The path to the media image.'],
				'alt'      => ['false', 'The alternate text for the image.']
			]
		]);
	}

	/* INITIALIZE DEFAULTS */
	
	if(!isset($right))    $right    = false;
	if(!isset($vertical)) $vertical = 'top';
	if(!isset($title))    $title    = false;
	if(!isset($body))     $body     = 'Empty.';
	if(!isset($path))     $path     = '';
	if(!isset($alt))      $alt      = false;
?>

<div class="media">
	<?php if(!$right): ?>
		<div class="media-left">
			<a href="#">
				<img class="media-object" src="<?= $path ?>"<?php if($alt) echo ' alt="'. $alt .'"'?>>
			</a>
		</div>
	<?php endif; ?>
	<div class="media-body">
		<h4 class="media-heading"><?= $title ?></h4>
		<?= $body ?>
	</div>
	<?php if($right): ?>
		<div class="media-right">
			<a href="#">
				<img class="media-object" src="<?= $path ?>"<?php if($alt) echo ' alt="'. $alt .'"'?>>
			</a>
		</div>
	<?php endif; ?>
</div>

<?php if(!empty($help)) echo '</div>'; ?>