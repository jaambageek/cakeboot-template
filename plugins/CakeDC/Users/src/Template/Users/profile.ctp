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
<?= $this->element('SiteManager.Bootstrap/page_header', ['title' => __d('Users', '{0} {1}', $user->first_name, $user->last_name)]) ?>
<div class="row">
	<div class="col-xs-12 col-sm-3">
		<?= $this->Html->image(empty($user->avatar) ? $avatarPlaceholder : $user->avatar, ['width' => '180', 'height' => '180']); ?>
		<br /><br />
		<table class="table">
			<tbody>
				<tr>
					<td><?= __d('Users', 'Username') ?></td>
					<th><?= h($user->username) ?></th>
				</tr>
				<tr>
					<td><?= __d('Users', 'Email') ?></td>
					<th><?= h($user->email) ?></th>
				</tr>
				<tr>
					<td><?= __d('Users', 'Password') ?></td>
					<th><?= $this->Html->link(__d('Users', 'Change Password'), ['plugin' => 'CakeDC/Users', 'controller' => 'Users', 'action' => 'changePassword']); ?></th>
				</tr>
				<tr>
					<td><?= __d('Users', 'Member Since') ?></td>
					<th><?= Time::parse($user->activation_date)->nice(); ?></th>
				</tr>
				<?php if (!empty($user->is_superuser)): ?>
				<tr>
					<td><?= __d('Users', 'Is Admin') ?></td>
					<th>Yes</th>
				</tr>
				<?php endif; ?>
				<?php if (!empty($user->social_accounts)): ?>
                	<?php foreach ($user->social_accounts as $socialAccount): $escapedUsername = h($socialAccount->username); $linkText = empty($escapedUsername) ? __d('Users', 'Link to {0}', h($socialAccount->provider)) : h($socialAccount->username) ?>
		            	<tr>
		                	<td><?= $this->Html->image($socialAccount->avatar, ['width' => '90', 'height' => '90']) ?></td>
		                    <td><?= h($socialAccount->provider) ?></td>
		                    <td><?= $this->Html->link($linkText, $socialAccount->link, ['target' => '_blank']) ?></td>
		                </tr>
		            <?php endforeach; ?>
		        <?php endif; ?>
			</tbody>
		</table>
	</div>
	<div class="col-xs-12 col-sm-9">
		
	</div>
</div>
