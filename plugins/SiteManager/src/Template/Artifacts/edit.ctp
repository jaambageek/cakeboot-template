<?php
	$body = "Test";
	$footer ="Buttons";
?>

<?= $this->element('SiteManager.Bootstrap/modal', ['title' => 'Edit Artifact', 'body' => $body, 'footer' => $footer]); ?>
