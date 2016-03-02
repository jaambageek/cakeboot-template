<?php
	/* BOOTSTRAP PAGE HEADER TEMPLATE */
	
	if(!empty($help)) {
		echo '<div class="help-box">';
		echo $this->element('help', [
			'element' => 'page_header',
			'options' => [
				'title'     => ['"Page Header"','The title of the page.'],
				'sub_title' => ['false','A smaller sub-title to follow.'],
				'id'        => ['false', 'An ID for anchor navigation references']
			]
		]);
	}

	/* INITIALIZE DEFAULTS */
	
	if(!isset($title))     $title     = 'Page Header';
	if(!isset($sub_title)) $sub_title = false;
	if(!isset($id))        $id = false;
?>

<div class="page-header">
	<?php if($id) echo '<span class="anchor" id="'.$id.'"></span>';?>
	<h1><?= $title ?> <?php if($sub_title) echo '<small>'. $sub_title .'</small>'?></h1>
</div>

<?php if(!empty($help)) echo '</div>'; ?>