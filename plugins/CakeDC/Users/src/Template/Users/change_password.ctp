<div class="row">
	<div class="col-xs-12 col-sm-6 col-sm-offset-3">
		<?= $this->element('SiteManager.Bootstrap/page_header', ['title' => 'Change Password']); ?>
		<?= $this->Form->create($user) ?>
		<fieldset>
			<?php if ($validatePassword) : ?>
			    <?= $this->Form->input('current_password', ['type' => 'password', 'required' => true, 'label' => __d('Users', 'Current password')]); ?>
			<?php endif; ?>
			<?= $this->Form->input('password'); ?>
			<?= $this->Form->input('password_confirm', ['type' => 'password', 'required' => true]); ?>
		</fieldset>
		<?= $this->Form->button(__d('Users', 'Submit'), ['templateVars' => ['class' => 'primary']]); ?>
		<?= $this->Form->end() ?>
	</div>
</div>