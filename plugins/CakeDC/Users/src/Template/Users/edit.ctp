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
	<?= $this->element('admin_panel'); ?>
	<div class="col-xs-12 col-sm-10">
		<?= $this->element('SiteManager.Bootstrap/page_header', ['title' => 'Edit User']); ?>
	    <?= $this->Form->create($Users); ?>
	    <fieldset>
	        <legend><?= __d('Users', 'Edit User') ?></legend>
	        <?php
	            echo $this->Form->input('username');
	            echo $this->Form->input('email');
	            echo $this->Form->input('first_name');
	            echo $this->Form->input('last_name');
				echo $this->Form->input('role');
				echo $this->Form->input('is_superuser', ['label' => 'Admin']);
	            echo $this->Form->input('active');
	        ?>
	    </fieldset>
	    <?= $this->Form->button(__d('Users', 'Submit'), ['templateVars' => ['class' => 'primary']]) ?>
	    <?= $this->Form->end() ?>
	  </div>
</div>
