<?php
	use Cake\Core\Configure;
	
	$permissions = Configure::read('Users.SimpleRbac.permissions');
	
	function disp($permission, $key) {
		$string = '';
		if(isset($permission[$key])) {
			if(is_array($permission[$key])) {
				foreach ($permission[$key] as $value) {
					if(!empty($string)) $string .= ', ';
					$string .= $value;
				}
			} else {
				$string = $permission[$key];
			}
		}
		
		if ($string === "*")   return "ALL";
		
		return $string;
	}
?>
<?= $this->element('SiteManager.Bootstrap/page_header', ['title' => 'Permissions']); ?>

<?= $this->element('SiteManager.Bootstrap/section', ['title' => 'Modifying Permissions:', 'body' => '']); ?>
	
<p class="lead">To modify the permissions structure for the site, create or modify <code>config/permissions.php</code>. Below you will find the currently implemented permissions.</p>
<p class="lead"><span class="label label-info">Public Actions:</span> These permissions are for logged in users only. To make certain actions public (accessible by none logged in users), add <code>$this->Auth->allow();</code> to the initialize function of any controller.</p>
<p class="lead"><span class="label label-info">Admin (Superuser):</span> Users marked as Admin are automatically allowed to access all actions. The role an Admin has assigned does not matter.</p>
<br />
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>Role</th>
			<th>Prefix</th>
			<th>Plugin</th>
			<th>Controller</th>
			<th>Action</th>
			<th>Allowed</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($permissions as $permission): ?>
			<tr>
				<td><?= disp($permission, 'role') ?></td>
				<td><?= disp($permission, 'prefix') ?></td>
				<td><?= disp($permission, 'plugin') ?></td>
				<td><?= disp($permission, 'controller') ?></td>
				<td><?= disp($permission, 'action') ?></td>
				<td><?php if(disp($permission, 'allowed') === false) echo 'NO'; else echo 'YES'; ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>