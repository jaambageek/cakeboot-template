<?php
	use Cake\View\Helper\SessionHelper;
	$session = $this->request->session();
?>

<div class="row">
	<div class="col-xs-12 col-sm-8 col-sm-offset-2">
		<?= $this->element('SiteManager.Bootstrap/page_header', ['title' => 'New Request']); ?>
		<p class="lead">Please use this form to submit new requests and to report any issues with your website. The more detail you provide the easier and faster we will be able to respond to your request.</p>
		<?php
			echo $this->Form->create($task);
			echo $this->Form->hidden('name', ['value' => $session->read('Auth.User.first_name')]);
			echo $this->Form->hidden('email', ['value' => $session->read('Auth.User.email')]);
			echo $this->Form->input('request');
			echo $this->Form->button('Submit', ['templateVars' => ['class' => 'primary pull-right']]);
			echo $this->Form->end();
		?>
	</div>
</div>
