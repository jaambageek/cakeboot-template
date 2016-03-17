<?php
	/* BOOTSTRAP CAROUSEL TEMPLATE */
	
	if(!empty($help)) {
		echo '<div class="help-box">';
		echo $this->element('help', [
			'element' => 'carousel',
			'options' => [
				'id'          => ['"my-carousel"','The id for the carousel, do not reuse the same id on the same page.'],
				'title'       => ['""','A title for the carousel. Will be displayed below the element.'],
				'images'      => ['[\'images\' => [\'path\' => \'logo.png\', \'alt\' => \'Some picture\', \'caption\' => \'My Test Pic\', \'title\' => false]]','An array of images to display in the carousel.']
			]
		]);
	}

	/* INITIALIZE DEFAULTS */
	
	if(!isset($id)) $id = 'my-carousel';
	if(!isset($images)) $images = ['images' => ['path' => 'logo.png', 'alt' => 'Some picture', 'caption' => 'My Test Pic', 'title' => false]];
	if(!isset($title)) $title = '';
?>

<div id="<?= $id ?>" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<?php $num = 0; ?>
		<?php foreach($images as $image): ?>
			<li data-target="#<?= $id ?>" data-slide-to="<?= $num ?>"<?php if($num == 0) echo ' class="active"' ?>></li>
			<?php $num++; ?>
		<?php endforeach; ?>
	</ol>
	
	<!-- Wrapper for slides -->
	<div class="carousel-inner" role="listbox">
		<?php $num = 0; ?>
		<?php foreach($images as $image): ?>
			<div class="item<?php if($num == 0) echo ' active' ?>">
				<img src="/img/<?= $image['path'] ?>"<?php if(!empty($image['alt'])) echo ' alt="'. $image['alt'] .'"'; ?>>
				<div class="carousel-caption">
					<?php if($image['title']): ?>
						<h3><?= $image['title'] ?></h3>
					<?php endif; ?>
					<p><?= $image['caption'] ?></p>
				</div>
			</div>
			<?php $num++; ?>
		<?php endforeach; ?>
		<?= $title ?>
	</div>
	
	<!-- Controls -->
	<a class="left carousel-control" href="#<?= $id ?>" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#<?= $id ?>" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>

<?php if(!empty($help)) echo '</div>'; ?>