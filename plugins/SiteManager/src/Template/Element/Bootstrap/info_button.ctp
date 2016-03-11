<?php
	/* BOOTSTRAP INFO BUTTON TEMPLATE */
	
	if(!empty($help)) {
		echo '<div class="help-box">';
		echo $this->element('help', [
			'element' => 'info_button',
			'options' => [
				'class'       => ['"default"','The button style (<code>"default"</code>, <code>"primary"</code>, <code>"success"</code>, <code>"info"</code>, <code>"warning"</code>, <code>"danger"</code>, <code>"link"</code>). You can also add in any other button style classes separated by a space (e.g. <code> btn-sm</code>)'],
				'icon'        => ['"info-sign"','The icon for the button.'],
				'title'       => ['null', 'The message title.'],
				'location'    => ['right', 'The location for the message (<code>"left"</code>, <code>"top"</code>, <code>"bottom"</code>, <code>"right"</code>, <code>"warning"</code>, <code>"danger"</code>, <code>"link"</code>).'],
				'message'     => ['"Some Info Message."', 'Presents this text to the user as information.']
			]
		]);
	}

	/* INITIALIZE DEFAULTS */
	
	if(!isset($class))   $class   = 'default';
	if(!isset($icon))    $icon    = 'info-sign';
	if(!isset($title))   $title   = null;
	if(!isset($location))$location= 'right';
	if(!isset($message)) $message = 'Some Info Message';

?>

<a tabindex="0" class="btn btn-<?= $class ?>" role="button" data-toggle="popover" data-trigger="focus" title="<?= $title ?>" data-placement="<?= $location ?>" data-content="<?= $message ?>"><?= $this->element('SiteManager.Bootstrap/icon', ['icon' => $icon]) ?></a>

<?php if(!empty($help)) echo '</div>'; ?>