<?= $this->element('Bootstrap/page_header', ['title' => 'Deliver Changes']); ?>

<div class="row">
	<div class="col-xs-12 col-sm-9">
		<table class="table">
			<thead>
				<tr>
					<th>File Name</th>
					<th>Dev Modified On</th>
					<th>Prod Modified On</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php if(empty($files)): ?>
					<tr class='success'><th class="text-center" colspan='4'><h3>All your files are in sync.</h3></th></tr>
				<?php endif; ?>
				<?php foreach($files as $name => $file): ?>
					<?php
						if(!empty($file['dev_date'])) $dev_date = $file['dev_date'];
						else $dev_date = null;
						
						if(!empty($file['prod_date'])) $prod_date = $file['prod_date'];
						else $prod_date = null;
						
						$actions = '';
						/* TODO: UPDATE THE BUTTON GROUP SO ITS THE SAME FOR ALL */
						$buttons = [
							'b1' => [
								'class' => 'danger', 
								'title' => $this->element('SiteManager.Bootstrap/icon', ['icon' => 'remove']),
								'confirm' => 'Are you sure you want to delete this file',
								'type'  => 'link'
							],
							'b2' => [
								'class' => 'default', 
								'title' => $this->element('SiteManager.Bootstrap/icon', ['icon' => 'download']),
								'tooltip' => 'Download from Production',
								'url'   => '/sitemgr/files/upload/development/'. str_replace('/', '___', $name),
								'type'  => 'link'
							],
							'b3' => [
								'class' => 'primary', 
								'title' => $this->element('SiteManager.Bootstrap/icon', ['icon' => 'upload']),
								'tooltip' => 'Upload to Production',
								'url'   => '/sitemgr/files/upload/production/'. str_replace('/', '___', $name),
								'type'  => 'link'
							]
						];
							
						if(empty($dev_date)) {
							// THE FILE DOESN''T EXIST ON DEV AND MOST LIKELY SHOULD BE DELETED FROM PRODUCTION.
							$class = 'danger';
							
							$buttons['b1']['tooltip'] = 'Delete From Production';
							$buttons['b1']['url']     = '/sitemgr/files/delete/production/'. str_replace('/', '___', $name);
							$buttons['b3']['url'] = '';
							$buttons['b3']['attrs'] = ['disabled' => 'disabled'];
							
							$actions = $this->element('SiteManager.Bootstrap/button_group', [
								'size'    => 'xs', 
								'label'   => 'actions', 
								'buttons' => $buttons
							]);
						} elseif(!empty($prod_date) && $prod_date > $dev_date) {
							// THE FILE IS NEWER IN PRODUCTION, PROBABLY MEANS SOMEONE MODIFIED IT IN THE WRONG PLACE.
							$class = 'danger';
							
							$buttons['b1']['tooltip'] = 'Delete From Production';
							$buttons['b1']['url']     = '/sitemgr/files/delete/production/'. str_replace('/', '___', $name);
							
							$actions = $this->element('SiteManager.Bootstrap/button_group', [
								'size'    => 'xs', 
								'label'   => 'actions', 
								'buttons' => $buttons
							]);
						} else {
							// THE FILE IS NEWER IN DEV AND SHOULD BE MOVED TO PRODUCTION WHEN READY.
							$class = 'info';

							if(empty($prod_date)) {
								$buttons['b1']['tooltip'] = 'Delete From Dev';
								$buttons['b1']['url']     = '/sitemgr/files/delete/development/'. str_replace('/', '___', $name);
								$buttons['b2']['url'] = '';
								$buttons['b2']['attrs'] = ['disabled' => 'disabled'];
							}
							
							$actions = $this->element('SiteManager.Bootstrap/button_group', [
								'size'    => 'xs', 
								'label'   => 'actions', 
								'buttons' => $buttons
							]);
						}
					?>
					<tr class="<?= $class ?>">
						<td><?= $name; ?></td>
						<td><?php if(!empty($file['dev_date'])) echo $file['dev_date']->nice(); ?></td>
						<td><?php if(!empty($file['prod_date'])) echo $file['prod_date']->nice(); ?></td>
						<td><?= $actions ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<div class="col-xs-12 col-sm-3">
		<div data-spy="affix" data-offset-top="0"></div>
			<table class="table">
				<thead>
					<tr>
						<th colspan="2">Stats</th>
					</tr>
				</thead>
				<tbody>
					<tr<?php if($stats['files_dev'] == $stats['files_prod']) echo ' class="success"'; else echo ' class="info"'; ?>>
						<td class="text-right">Number of files Dev/Prod</td>
						<th><?= $stats['files_dev']; ?>/<?= $stats['files_prod']; ?></th>
					</tr>
					<tr<?php if($stats['unique_dev'] == 0) echo ' class="success"'; else echo ' class="info"'; ?>>
						<td class="text-right">Unique files Dev</td>
						<th><?= $stats['unique_dev']; ?></th>
					</tr>
					<tr<?php if($stats['unique_prod'] == 0) echo ' class="success"'; else echo ' class="danger"'; ?>>
						<td class="text-right">Unique files Prod</td>
						<th><?= $stats['unique_prod']; ?></th>
					</tr>
					<tr<?php if($stats['newer_dev'] == 0) echo ' class="success"'; else echo ' class="info"'; ?>>
						<td class="text-right">Newer files Dev</td>
						<th><?= $stats['newer_dev']; ?></th>
					</tr>
					<tr<?php if($stats['newer_prod'] == 0) echo ' class="success"'; else echo ' class="danger"'; ?>>
						<td class="text-right">Newer files Prod</td>
						<th><?= $stats['newer_prod']; ?></th>
					</tr>
					<tr>
						<td colspan="2">You can use this to upload development files to the client production site at once. This will not remove unique files on the production site. It will overwrite all existing files on the production system, even if the date is newer.<br />
						<?= 
							$button = $this->element('SiteManager.Bootstrap/button', [
								'class' => 'default pull-right', 
								'title' => $this->element('SiteManager.Bootstrap/icon', ['icon' => 'upload']) .' Upload All', 
								'type'  => 'link', 
								'url'   => '/sitemgr/files/sync',
								'confirm' => 'Upload all files to Production?'
							]); 
						?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>