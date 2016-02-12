<?php
	/* BOOTSTRAP PAGE HEADER TEMPLATE */
	
	if(!empty($help)) {
		echo '<div class="help-box">';
		echo $this->element('help', [
			'element' => 'page_header',
			'options' => [
				'title'     => ['"Page Header"','The title of the page.'],
				'sub_title' => ['false','A smaller sub-title to follow.']
			]
		]);
	}

	/* INITIALIZE DEFAULTS */
	
	if(!isset($title))     $title     = 'Page Header';
	if(!isset($sub_title)) $sub_title = false;
?>

<div class="page-header">
  <h1><?= $title ?> <?php if($sub_title) echo '<small>'. $sub_title .'</small>'?></h1>
</div>

<?php if(!empty($help)) echo '</div>'; ?>