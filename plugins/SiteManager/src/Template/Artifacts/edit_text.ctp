<?php
	$body = $this->Form->create($artifact, ['id' => 'editForm']);
	$body .= $this->Form->hidden('name');
	$body .= $this->Form->hidden('type');
	$body .= $this->Form->input('content');
	$body .= $this->Form->end();

	$footer = $this->element('SiteManager.Bootstrap/button', ['class' => 'primary', 'title' => 'Save', 'type' => 'button', 'url' => 'document.getElementById(\'editForm\').submit()']);
?>

<?= $this->element('SiteManager.Bootstrap/modal', ['title' => 'Edit Artifact', 'body' => $body, 'footer' => $footer]); ?>
