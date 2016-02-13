<?php
	/* BOOTSTRAP DROPDOWN TEMPLATE */
	
	if(!empty($help)) {
		echo '<div class="help-box">';
		echo $this->element('help', [
			'element' => 'dropdown',
			'options' => [
				'direction'   => ['"down"','The direction in which the menu opens (<code>"down"</code>, <code>"up"</code>).'],
				'split'       => ['false', 'You can split the dropdown with a default option by sending an onclick event here. Or set to false.'],
				'side'        => ['"left"','Which side the dropdown is aligned to (<code>"left"</code>, <code>"right"</code>).'],
				'class'       => ['"btn-default"','The button style (<code>"default"</code>, <code>"primary"</code>, <code>"success"</code>, <code>"info"</code>, <code>"warning"</code>, <code>"danger"</code>, <code>"link"</code>). You can also add in any other button style classes separated by a space (e.g. <code> btn-sm</code>)'],
				'title'       => ['"Dropdown"','The title of the button.'],
				'list'        => ['{Sample list}','Array of items for the list. See types below (<code>"link"</code>, <code>"header"</code>, <code>"divider"</code>).'],
				'link'        => ['N/A', 'Type, Name, Path, Dissabled. Example: <code>[\'link\', \'Link\', \'/pages/mypage\', \'true\']</code>'],
				'header'      => ['N/A', 'Type, Title. Example: <code>[\'header\', \'My Header\']</code>'],
				'divider'     => ['N/A', 'Type. Example: <code>[\'divider\']</code>']
			]
		]);
	}

	/* INITIALIZE DEFAULTS */
	
	if(!isset($direction)) $direction = 'down';
	if(!isset($split)) $split = false;
	if(!isset($class)) $class = 'default';
	if(!isset($title)) $title = 'Dropdown';
	if(!isset($list))  $list = [['header','Heading'], ['divider'], ['link','Link','/']];
	
	$id = rand();
?>

<div class="btn-group drop<?= $direction ?>">
	<?php if(!empty($split)): ?>
		<button type="button" class="btn btn-<?= $class ?>" onclick="<?= $split ?>"><?= $title ?></button>
		<button class="btn btn-<?= $class ?> dropdown-toggle" type="button" id="dropdownMenu<?= $id ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
			<span class="caret"></span>
			<span class="sr-only">Toggle Dropdown</span>
		</button>
	<?php else: ?>
		<button class="btn btn-<?= $class ?> dropdown-toggle" type="button" id="dropdownMenu<?= $id ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
			<?= $title ?>
			<span class="caret"></span>
		</button>
	<?php endif; ?>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu<?= $id ?>">
    <?php foreach($list as $item): ?>
    	<?php if(isset($item[0])): ?>
	    	<?php if($item[0] == 'link'): ?>
	    		<li <?php if(!empty($item[3])) echo 'class="dissabled"' ?>><a href="<?= $item[2] ?>"><?= $item[1] ?></a></li>
	    	<?php elseif($item[0] == 'header'): ?>
	    		<li class="dropdown-header"><?= $item[1] ?></li>
	    	<?php elseif($item[0] == 'divider'): ?>
	    		<li role="separator" class="divider"></li>
	    	<?php endif; ?>
	<?php endif; ?>
    <?php endforeach; ?>
  </ul>
</div>

<?php if(!empty($help)) echo '</div>'; ?>