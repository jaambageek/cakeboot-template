<?php
	use Cake\ORM\TableRegistry;
	use Cake\Core\Configure;
	use Cake\View\Helper\TextHelper;
	use SiteManager\View\Helper\SiteManagerHelper;

	$artifacts = TableRegistry::get('Artifacts');
	$artifact = $artifacts->find()->where(['name' => $name])->first();
	
	if(empty($artifact->id)) $id = str_replace(' ', '_', $name);
	else $id = $artifact->id;
	
	if(!isset($class)) $class = 'lead';
	if(!isset($tag))   $tag = 'h1';
?>

<?php 
	if(Configure::read('debug')) $this_mode = 'edit';
	else $this_mode = 'public';
?>

<div class="artifact-<?= $this_mode ?>">
	
	<?php if(empty($artifact)): ?>
		<p class="lead">Empty Artifact</p>
	<?php elseif($artifact->type == 'text'): ?>
		<?= $this->SiteManager->autoParagraph($this->Text->autoLink($artifact->content), $class); ?>
	<?php elseif($artifact->type == 'heading'): ?>
		<<?= $tag ?>><?= $artifact->content; ?></<?= $tag ?>>
	<?php endif;?>

	<div class="edit-box">
		<?= 
			$this->element('SiteManager.Bootstrap/button', [
				'title' => $this->element('SiteManager.Bootstrap/icon', ['icon' => 'pencil']), 
				'class' => 'primary btn-sm edit-button', 
				'type' => 'button',
				'url' => 'updateModal(\'/sitemgr/artifacts/edit/'. $id .'\')'
			]); 
		?>
	</div>
</div>