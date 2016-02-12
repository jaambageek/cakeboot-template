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
				<?php foreach($files as $name => $file): ?>
					<?php
						if(!empty($file['dev_date'])) $dev_date = $file['dev_date'];
						if(!empty($file['prod_date'])) $prod_date = $file['prod_date'];
						
						$actions = '';
						if(empty($dev_date)) {
							// THE FILE DOESN''T EXIST ON DEV AND MOST LIKELY SHOULD BE DELETED FROM PRODUCTION.
							$class = 'danger';
						} elseif(!empty($prod_date) && $prod_date > $dev_date) {
							// THE FILE IS NEWER IN PRODUCTION, PROBABLY MEANS SOMEONE MODIFIED IT IN THE WRONG PLACE.
							$class = 'danger';
						} else {
							// THE FILE IS NEWER IN DEV AND SHOULD BE MOVED TO PRODUCTION WHEN READY.
							$class = 'info';
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
			</tbody>
		</table>
	</div>
</div>