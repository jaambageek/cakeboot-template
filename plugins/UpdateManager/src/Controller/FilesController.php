<?php
	namespace UpdateManager\Controller;
	
	use UpdateManager\Controller\AppController;
	use Cake\Filesystem\Folder;
	use Cake\Filesystem\File;
	use Cake\I18n\Time;
	
	class FilesController extends AppController
	{
	    public function index()
	    {
	    	$files = [];
	    	
		$d = 0;
		$dir = new Folder(dirname('../src'));
		$files_dev = $dir->find('.*');
		sort($files_dev);
		foreach ($files_dev as $file) {
			$file = new File($dir->pwd() . DS . $file);
			$files[$file->name]['dev_date'] = Time::createFromTimestamp(round($file->lastChange()/60)*60);
			$d++;
		}
		$ud = $d; // Unique Files Dev. Will Subtract 1 for each file match.
		$nd = 0; // Newer Files Dev.
		
		$p = 0;
		$up = 0;
		$np = 0;
		$dir = new Folder(dirname('../../production/src'));
		$files_prod = $dir->find('.*');
		sort($files_prod);
		foreach ($files_prod as $file) {
			$file = new File($dir->pwd() . DS . $file);
			$name = $file->name;
			$date = Time::createFromTimestamp(round($file->lastChange()/60)*60);
			$files[$file->name]['prod_date'] = $date;
			
			if(!empty($files[$name]['dev_date'])) {
				$ud--;
				if($date < $files[$name]['dev_date']) $nd++;
				elseif($date > $files[$name]['dev_date']) $np++;
				else unset($files[$name]);
			} else {
				$up++;
			} 
			$p++;
		}
		
		$stats = [
	    		'files_dev'   => $d,
	    		'files_prod'  => $p,
	    		'unique_dev'  => $ud,
	    		'unique_prod' => $up,
	    		'newer_dev'   => $nd,
	    		'newer_prod'  => $np
	    	];
	    	
		$this->set('files', $files);
		$this->set('stats', $stats);
	    }
	}
?>