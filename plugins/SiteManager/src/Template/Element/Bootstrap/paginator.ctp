<?php
	/* BOOTSTRAP PAGINATOR TEMPLATE */
	
	if(!empty($help)) {
		echo '<div class="help-box">';
		echo $this->element('help', [
			'element' => 'paginator',
			'options' => [
				'type' => ['"numbers"','The type of paginator to load.']
			]
		]);
	}

	/* INITIALIZE DEFAULTS */
	
	if(!isset($type)) $type = 'numbers';
?>

<nav>
	<ul class="pagination">
		<?= $this->Paginator->first(' << '); ?>
		<?= $this->Paginator->prev(' < '); ?>
		<?= $this->Paginator->numbers(); ?>
		<?= $this->Paginator->next(' > '); ?>
		<?= $this->Paginator->last(' >> '); ?>
	</ul>
</nav>

<?php if(!empty($help)) echo '</div>'; ?>