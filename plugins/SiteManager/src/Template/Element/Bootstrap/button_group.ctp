<?php
	/* BOOTSTRAP BUTTON GROUP TEMPLATE */
	
	if(!empty($help)) {
		echo '<div class="help-box">';
		echo $this->element('help', [
			'element' => 'button_group',
			'options' => [
				'size'        => ['false','Specify an alternate size for the button group (<code>"lg"</code>, <code>"sm"</code>, <code>"xs"</code>).'],
				'vertical'    => ['false','Set to true for a vertical button group.'],
				'justified'   => ['false','Set to true to display the button group across the whole parent element.'],
				'label'       => ['"Button Group"','Screen reader label for accessibility.'],
				'buttons'     => ['{Sample buttons}', 'An array of buttons to populate the group. See button element for options.']
			]
		]);
	}

	/* INITIALIZE DEFAULTS */
	
	if(!isset($size))      $size      = false;
	if(!isset($vertical))  $vertical  = false;
	if(!isset($justified)) $justified = false;
	if(!isset($label))     $label     = 'Button Group';
	if(!isset($buttons))   $buttons   = [['title' => 'B1', 'url' => '/', 'type' => 'link'],['title' => 'B2', 'url' => '/', 'type' => 'link'],['title' => 'B3', 'url' => '/', 'type' => 'link']];
?>

<div class="btn-group<?php if($vertical) echo ' btn-group-vertical' ?><?php if(!empty($size)) echo ' btn-group-'. $size ?><?php if($justified) echo ' btn-group-justified' ?>" role="group" aria-label="<?= $label ?>">
	<?php foreach($buttons as $button): ?>
		<?= $this->element('SiteManager.Bootstrap/button', $button); ?>
	<?php endforeach; ?>
</div>

<?php if(!empty($help)) echo '</div>'; ?>