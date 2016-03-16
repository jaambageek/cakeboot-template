<?php
	/* BOOTSTRAP PAGE HEADER TEMPLATE */
	
	if(!empty($help)) {
		echo '<div class="help-box">';
		echo $this->element('help', [
			'element' => 'page_header',
			'options' => [
				'title'     => ['"Page Header"','The title of the page.'],
				'sub_title' => ['false','A smaller sub-title to follow.'],
				'id'        => ['false', 'An ID for anchor navigation references'],
				'right'     => ['false', 'Set to true to pull the header to the right.']
			]
		]);
	}

	/* INITIALIZE DEFAULTS */
	
	if(!isset($title))     $title     = 'Page Header';
	if(!isset($sub_title)) $sub_title = false;
	if(!isset($id))        $id        = false;
	if(!isset($right))     $right     = false;
?>

<div class="page-header">
	<?php if($id) echo '<span class="anchor" id="'.$id.'"></span>';?>
	<h1<?php if($right) echo ' class="text-right"'; ?>><?= $title ?> <?php if($sub_title) echo '<small>'. $sub_title .'</small>'?></h1>
</div>

<?php if(!empty($help)) echo '</div>'; ?>