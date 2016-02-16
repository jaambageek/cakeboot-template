<div class="col-xs-12 col-sm-2">
	<h3><?= __d('Users', 'Actions') ?></h3>
    <ul class="nav nav-pills nav-stacked">
        <li role="presentation" <?php if(!preg_match('/(add|edit|view)/', $this->request->here())) echo 'class="active"'; ?>><?= $this->Html->link(__d('Users', 'List Users'), ['action' => 'index']) ?></li>
        <li role="presentation" <?php if(strpos($this->request->here(), '/users/users/add') !== false) echo 'class="active"'; ?>><?= $this->Html->link(__d('Users', 'New User'), ['action' => 'add']) ?></li>
    </ul>
</div>
