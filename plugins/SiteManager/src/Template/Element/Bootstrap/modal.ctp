<?php
	/* BOOTSTRAP MODAL TEMPLATE */
	
	if(!empty($help)) {
		echo '<div class="help-box">';
		echo $this->element('help', [
			'element' => 'modal',
			'options' => [
				'title'     => ['"Modal Title"','The title of the modal.'],
				'body'      => ['"Some content"','The main body of the modal.'],
				'footer'    => ['null', 'The footer for the modal, typically buttons.']
			]
		]);
	}

	/* INITIALIZE DEFAULTS */
	
	if(!isset($title))     $title     = 'Modal Title';
	if(!isset($body))      $body      = 'Some content';
	if(!isset($footer))    $footer    = '';
?>

<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title" id="myModalLabel"><?= $title; ?></h4>
</div>
<div class="modal-body">
	<?= $body; ?>
</div>
<div class="modal-footer">
	<?= $footer; ?>
</div>

<?php if(!empty($help)) echo '</div>'; ?>