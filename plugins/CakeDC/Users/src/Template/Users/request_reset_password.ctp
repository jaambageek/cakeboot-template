<div class="row">
	<div class="col-xs-12 col-sm-6 col-sm-offset-3">
		<?= $this->element('SiteManager.Bootstrap/page_header', ['title' => 'Reset Password']); ?>
	    <?= $this->Form->create('User') ?>
	    <fieldset>
	        <legend><?= __d('Users', 'Please enter your email or username to reset your password') ?></legend>
	        <?= $this->Form->input('reference', ['label' => __d('Users', 'Email or username')]) ?>
	    </fieldset>
	    <?= $this->Form->button(__d('Users', 'Submit'), ['templateVars' => ['class' => 'primary']]); ?>
	    <?= $this->Form->end() ?>
	</div>
</div>
