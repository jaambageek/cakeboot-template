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
		<?= $this->element('SiteManager.Bootstrap/page_header', ['title' => 'Register']); ?>
		<?= $this->Form->create($user); ?>
	    <fieldset>
	        <?php
	        echo $this->Form->input('username');
	        echo $this->Form->input('email');
	        echo $this->Form->input('password');
	        echo $this->Form->input('password_confirm', ['type' => 'password']);
	        echo $this->Form->input('first_name');
	        echo $this->Form->input('last_name');
	        echo $this->Form->input('tos', ['type' => 'checkbox', 'label' => __d('Users', 'Accept TOS conditions?'), 'required' => true]);
	        echo $this->User->addReCaptcha();
	        ?>
	    </fieldset>
	    <?= $this->Form->button(__d('Users', 'Submit'), ['templateVars' => ['class' => 'primary']]) ?>
	    <?= $this->Form->end() ?>
	</div>
</div>
