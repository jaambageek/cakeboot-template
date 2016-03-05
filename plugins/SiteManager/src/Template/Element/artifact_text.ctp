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
	if(Configure::read('debug')) $this_mode = 'edit';
	else $this_mode = 'public';
?>

<span class="artifact-<?= $this_mode ?>">
	
	<?php if(empty($artifact)): ?>
		Empty Artifact
	<?php else: ?>
		<?= $this->SiteManager->autoParagraph($this->Text->autoLink($artifact->content)); ?>
	<?php endif; ?>

	<span class="edit-box">
		<?= 
			$this->element('SiteManager.Bootstrap/button', [
				'title' => $this->element('SiteManager.Bootstrap/icon', ['icon' => 'pencil']), 
				'class' => 'primary btn-sm edit-button', 
				'type' => 'button',
				'url' => 'updateModal(\'/sitemgr/artifacts/edit_text/'. $id .'\')'
			]); 
		?>
	</span>
</span>