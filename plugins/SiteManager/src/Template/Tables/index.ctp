<?= $this->element('Bootstrap/page_header', ['title' => 'Initialize Tables']); ?>
<p class="lead">
  <strong>User Plugin Tables: </strong>
  <?php
  	$update = false;
  	foreach($user_status as $migration) {
		if(($migration['name']) && ($migration['status'] == 'down')) {
			$update = true;
		}
	}
	if($update) echo $this->Html->link('Update', '/sitemgr/tables/setup/user');
	else echo $this->Html->link('Remove Tables', '/sitemgr/tables/remove/user');
  ?>
</p>
<p class="lead">
  <strong>Site Manager Plugin Tables: </strong>
  <?php
  	$update = false;
  	foreach($sitemgr as $migration) {
		if(($migration['name']) && ($migration['status'] == 'down')) {
			$update = true;
		}
	}
	if($update) echo $this->Html->link('Update', '/sitemgr/tables/setup/sitemgr');
	else echo $this->Html->link('Remove Tables', '/sitemgr/tables/remove/sitemgr');
  ?>
</p>
<p class="lead">
  <strong>Local Site Tables: </strong>
  <?php
  	if(!empty($local)) {
	  	$update = false;
	  	foreach($local as $migration) {
			if(($migration['name']) && ($migration['status'] == 'down')) {
				$update = true;
			}
		}
		if($update) echo $this->Html->link('Update', '/sitemgr/tables/setup/local');
		else echo $this->Html->link('Remove Tables', '/sitemgr/tables/remove/local');
	}
  ?>
</p>
