<?php
	$body = $this->Form->create($artifact, ['id' => 'editForm']);
	$body .= $this->Form->input('name');
	$body .= '<div class="form-group">';
	$body .= $this->Form->label('type');
	$body .= $this->Form->select('type', $options);
	$body .= '</div>';
	$body .= $this->Form->input('content');
	$body .= $this->Form->end();

	$footer = $this->element('SiteManager.Bootstrap/button', ['class' => 'primary', 'title' => 'Save', 'type' => 'button', 'url' => 'document.getElementById(\'editForm\').submit()']);
?>

<?= $this->element('SiteManager.Bootstrap/modal', ['title' => 'Edit Artifact', 'body' => $body, 'footer' => $footer]); ?>
