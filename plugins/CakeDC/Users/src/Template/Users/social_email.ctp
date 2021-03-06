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
<div class="users form">
    <?= $this->Form->create('User') ?>
    <fieldset>
        <legend><?= __d('Users', 'Please enter your email') ?></legend>
        <?= $this->Form->input('email') ?>
    </fieldset>
    <?= $this->User->addReCaptcha(); ?>
    <?= $this->Form->button(__d('Users', 'Submit'), ['templateVars' => ['class' => 'primary']]); ?>
    <?= $this->Form->end() ?>
</div>
