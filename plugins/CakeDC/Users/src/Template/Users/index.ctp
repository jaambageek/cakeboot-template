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
		<?= $this->element('SiteManager.Bootstrap/page_header', ['title' => 'All Users', 'sub_title' => 'Page '. $this->Paginator->counter()]); ?>
		<table class="table table-hover">
	    <thead>
	        <tr>
	            <th><?= $this->Paginator->sort('username') ?></th>
	            <th class="hidden-xs"><?= $this->Paginator->sort('email') ?></th>
	            <th class="hidden-xs"><?= $this->Paginator->sort('first_name') ?></th>
	            <th class="hidden-xs"><?= $this->Paginator->sort('last_name') ?></th>
	            <th><?= $this->Paginator->sort('role') ?></th>
	            <th><?= $this->Paginator->sort('is_superuser', 'Admin') ?></th>
	            <th class="actions"><?= __d('Users', 'Actions') ?></th>
	        </tr>
	    </thead>
	    <tbody>
	    <?php foreach ($Users as $user): ?>
	        <tr>
	            <td><?= $this->Html->link(__d('Users', h($user->username)), ['action' => 'view', $user->id], ['title' => 'View']) ?></td>
	            <td class="hidden-xs"><?= h($user->email) ?></td>
	            <td class="hidden-xs"><?= h($user->first_name) ?></td>
	            <td class="hidden-xs"><?= h($user->last_name) ?></td>
	            <td><?= ucfirst(h($user->role)) ?></td>
	            <td><?php if($user->is_superuser) echo 'Yes'; ?></td>
	            <td class="actions">
	            	<?php
	            		if($user->is_superuser) $admin_icon = 'thumbs-down';
						else $admin_icon = 'thumbs-up';
	            		
	            		$buttons = [
	            			'edit'   => ['type' => 'link', 'title' => $this->element('SiteManager.Bootstrap/icon', ['icon' => 'pencil']), 'url' => 'users/edit/'. $user->id, 'attrs' => ['title' => 'Edit']],
	            			'chpw'   => ['type' => 'link', 'title' => $this->element('SiteManager.Bootstrap/icon', ['icon' => 'lock']), 'url' => 'users/changePassword/'. $user->id, 'attrs' => ['title' => 'Change Password']],
	            			'admin'  => ['type' => 'link', 'title' => $this->element('SiteManager.Bootstrap/icon', ['icon' => $admin_icon]), 'url' => 'users/superuser/'. $user->id, 'attrs' => ['title' => 'Toggle Admin Access']]
	            		];
						
						echo $this->element('SiteManager.Bootstrap/button_group', ['buttons' => $buttons, 'size' => 'xs']);
	            	?>
	                <?= $this->Form->postLink($this->element('SiteManager.Bootstrap/icon', ['icon' => 'remove']), ['action' => 'delete', $user->id], ['title' => 'Delete', 'escape' => false, 'class' => 'btn btn-danger btn-xs', 'confirm' => __d('Users', 'Are you sure you want to delete user: {0}?', $user->username)]) ?>
	            </td>
	        </tr>
	
	    <?php endforeach; ?>
	    </tbody>
	    </table>
	    <div class="paginator">
	        <ul class="pagination">
	            <?= $this->Paginator->prev('< ' . __d('Users', 'previous')) ?>
	            <?= $this->Paginator->numbers() ?>
	            <?= $this->Paginator->next(__d('Users', 'next') . ' >') ?>
	        </ul>
	    </div>
	</div>
</div>
