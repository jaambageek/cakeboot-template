<?php
	use Cake\ORM\TableRegistry;
	use Cake\Core\Configure;
	use Cake\View\Helper\TextHelper;
	use SiteManager\View\Helper\SiteManagerHelper;

	$artifacts = TableRegistry::get('Artifacts');
	$artifact = $artifacts->find()->where(['name' => $name])->first();
	
	if(empty($artifact->id)) $id = str_replace(' ', '_', $name);
	else $id = $artifact->id;
?>

<?php 
	$this->loadHelper('User');
	
	$role  = $this->User->role();
	$admin = $this->User->admin();
	
	if($this->request->session()->check('edit_mode'))
		$mode = $this->request->session()->read('edit_mode');
	else 
		$mode = false;

	if((($role == 'owner') || ($admin)) && ($mode)) $this_mode = 'edit';
	else $this_mode = 'public';
?>

<span class="artifact-<?= $this_mode ?>">
	
	<?php if(empty($artifact)): ?>
		Empty Artifact
	<?php else: ?>
		<?= $this->SiteManager->autoParagraph($artifact->content); ?>
	<?php endif; ?>

	<?php if($this_mode == 'edit'): ?>
		<span class="edit-box" onclick="updateModal('/sitemgr/artifacts/edit_text/<?= $id ?>')"></span>
	<?php endif; ?>
</span>