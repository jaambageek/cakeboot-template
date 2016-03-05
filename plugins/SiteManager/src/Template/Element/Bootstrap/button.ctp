<?php
	/* BOOTSTRAP BUTTON TEMPLATE */
	
	if(!empty($help)) {
		echo '<div class="help-box">';
		echo $this->element('help', [
			'element' => 'button',
			'options' => [
				'class'       => ['"default"','The button style (<code>"default"</code>, <code>"primary"</code>, <code>"success"</code>, <code>"info"</code>, <code>"warning"</code>, <code>"danger"</code>, <code>"link"</code>). You can also add in any other button style classes separated by a space (e.g. <code> btn-sm</code>)'],
				'title'       => ['"Button"','The title of the button.'],
				'url'         => ['"alert(\'Test\')"', 'URL or onclick action for the button.'],
				'tooltip'     => ['null', 'The button description.'],
				'type'        => ['"button"', 'The type of button (<code>"button"</code>, <code>"submit"</code>, <code>"link"</code>).'],
				'confirm'     => ['false', 'Presents this text to the user to confirm the button or link click.'],
				'attrs'       => ['[empty]', 'Set any other attributes for the button (e.g. <code>[\'dissabled\' => \'dissabled\']</code>)']
			]
		]);
	}

	/* INITIALIZE DEFAULTS */
	
	if(!isset($class))   $class   = 'default';
	if(!isset($title))   $title   = 'Button';
	if(!isset($url))     $url     = 'alert(\'Test\')';
	if(!isset($tooltip)) $tooltip = null;
	if(!isset($type))    $type    = 'button';
	if(!isset($confirm)) $confirm = false;
	if(!isset($attrs))   $attrs   = null;

?>
<?php
	$vars = '';
	if(!empty($attrs)) {
		foreach($attrs as $key => $value) {
			$vars .= ' '. $key .'="'. $value .'"';
		}
	}
?>

<?php if($type == 'link'): ?>
	<a class="btn btn-<?= $class ?>" href="<?= $url ?>" role="button" title="<?= $tooltip ?>" <?php if($confirm) echo 'onclick="return confirm(\''. $confirm .'\')"' ?> <?= $vars ?>><?= $title ?></a>
<?php else: ?>
	<button class="btn btn-<?= $class ?>" type="<?= $type ?>" onclick="<?php if($confirm){ echo 'if(confirm(\''. $confirm .'\')) '. $url; } else { echo $url; } ?>" title="<?= $tooltip ?>" <?= $vars ?>><?= $title ?></button>
<?php endif; ?>

<?php if(!empty($help)) echo '</div>'; ?>