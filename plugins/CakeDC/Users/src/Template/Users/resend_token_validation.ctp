<?php
/**
 * Copyright 2010 - 2015, Cake Development Corporation (http://cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2015, Cake Development Corporation (http://cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<div class="row">
	<div class="col-xs-12 col-sm-6 col-sm-offset-3">
		<?= $this->element('SiteManager.Bootstrap/page_header', ['title' => 'Resend Validation email']); ?>
	    <?= $this->Form->create('User') ?>
	    <fieldset>
	        <legend><?= __d('Users', 'Please enter your email or username to resend the validation email') ?></legend>
	        <?= $this->Form->input('reference', ['label' => __d('Users', 'Email or username')]) ?>
	    </fieldset>
	    <?= $this->Form->button(__d('Users', 'Submit'), ['templateVars' => ['class' => 'primary']]); ?>
	    <?= $this->Form->end() ?>
	</div>
</div>
