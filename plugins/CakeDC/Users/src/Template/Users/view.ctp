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
 
  use Cake\I18n\Time;
?>
<div class="row">
	<?= $this->element('admin_panel'); ?>
	<div class="col-xs-12 col-sm-10">
		<?= $this->element('SiteManager.Bootstrap/page_header', ['title' => h($Users->first_name .' '. $Users->last_name)]); ?>
        <h4 class="subheader"><?= __d('Users', 'User Info') ?></h4>
        <table class="table">
        	<tbody>
        		<tr>
        			<td><?= __d('Users', 'Id') ?></td>
        			<th><?= h($Users->id) ?></th>
        		</tr>
        		<tr>
        			<td><?= __d('Users', 'Username') ?></td>
        			<th><?= h($Users->username) ?></th>
        		</tr>
        		<tr>
        			<td><?= __d('Users', 'Email') ?></td>
        			<th><?= h($Users->email) ?></th>
        		</tr>
        		<tr>
        			<td><?= __d('Users', 'Name') ?></td>
        			<th><?= h($Users->first_name .' '. $Users->last_name) ?></th>
        		</tr>
        		<tr>
        			<td><?= __d('Users', 'Active') ?></td>
        			<th><?php if($Users->active) echo "Yes" ?></th>
        		</tr>
        		<tr>
        			<td><?= __d('Users', 'Admin') ?></td>
        			<th><?php if($Users->is_superuser) echo "Yes" ?></th>
        		</tr>
        		<tr>
        			<td><?= __d('Users', 'Activation Date') ?></td>
        			<th><?= h($Users->activation_date->nice()) ?></th>
        		</tr>
        		<tr>
        			<td><?= __d('Users', 'Tos Date') ?></td>
        			<th><?= h($Users->tos_date->nice()) ?></th>
        		</tr>
        		<tr>
        			<td><?= __d('Users', 'Created') ?></td>
        			<th><?= h($Users->created->nice()) ?></th>
        		</tr>
        		<tr>
        			<td><?= __d('Users', 'Modified') ?></td>
        			<th><?= h($Users->modified->nice()) ?></th>
        		</tr>
        	</tbody>
        </table>

        <h4 class="subheader"><?= __d('Users', 'Related Accounts') ?></h4>
        <?php if (!empty($Users->social_accounts)): ?>
            <table class="table">
                <tr>
                    <th><?= __d('Users', 'Id') ?></th>
                    <th><?= __d('Users', 'User Id') ?></th>
                    <th><?= __d('Users', 'Provider') ?></th>
                    <th><?= __d('Users', 'Username') ?></th>
                    <th><?= __d('Users', 'Reference') ?></th>
                    <th><?= __d('Users', 'Avatar') ?></th>
                    <th><?= __d('Users', 'Token') ?></th>
                    <th><?= __d('Users', 'Token Expires') ?></th>
                    <th><?= __d('Users', 'Active') ?></th>
                    <th><?= __d('Users', 'Data') ?></th>
                    <th><?= __d('Users', 'Created') ?></th>
                    <th><?= __d('Users', 'Modified') ?></th>
                    <th class="actions"><?= __d('Users', 'Actions') ?></th>
                </tr>
                <?php foreach ($Users->social_accounts as $socialAccount): ?>
                    <tr>
                        <td><?= h($socialAccount->id) ?></td>
                        <td><?= h($socialAccount->user_id) ?></td>
                        <td><?= h($socialAccount->provider) ?></td>
                        <td><?= h($socialAccount->username) ?></td>
                        <td><?= h($socialAccount->reference) ?></td>
                        <td><?= h($socialAccount->avatar) ?></td>
                        <td><?= h($socialAccount->token) ?></td>
                        <td><?= h($socialAccount->token_expires) ?></td>
                        <td><?= h($socialAccount->active) ?></td>
                        <td><?= h($socialAccount->data) ?></td>
                        <td><?= h($socialAccount->created) ?></td>
                        <td><?= h($socialAccount->modified) ?></td>

                        <td class="actions">
                            <?= $this->Html->link(__d('Users', 'View'), ['controller' => 'Accounts', 'action' => 'view', $socialAccount->id]) ?>

                            <?= $this->Html->link(__d('Users', 'Edit'), ['controller' => 'Accounts', 'action' => 'edit', $socialAccount->id]) ?>

                            <?= $this->Form->postLink(__d('Users', 'Delete'), ['controller' => 'Accounts', 'action' => 'delete', $socialAccount->id], ['confirm' => __d('Users', 'Are you sure you want to delete # {0}?', $accounts->id)]) ?>

                        </td>
                    </tr>
        		<?php endforeach; ?>
        	</table>
        <?php endif; ?>
    </div>
</div>
