<?php
	namespace SiteManager\Controller;

	use SiteManager\Controller\AppController;
	use Cake\Filesystem\Folder;
	use Cake\Filesystem\File;
	use Cake\I18n\Time;

	class FilesController extends AppController
	{
	    public function index()
	    {
	    	$files = [];
			
	    	$dev_folders_to_check = ['../src', '../plugins', '../webroot'];
			$prod_folders_to_check = ['../../production/src', '../../production/plugins', '../../production/webroot'];
			$d = 0;
			
			foreach($dev_folders_to_check as $folder) {
				$dir = new Folder($folder);
				$tree = $dir->tree(null, ['.htaccess','error_log'])[1];
				
				sort($tree);
				foreach ($tree as $entry) {
					$file = new File($entry);
					preg_match('/.*development(.*)/', $entry, $filename);
					$filename = $filename[1];
					$files[$filename]['dev_date'] = Time::createFromTimestamp(round($file->lastChange()/60)*60);
					$d++;
				}
			}
			
			$ud = $d; // Unique Files Dev. Will Subtract 1 for each file match.
			$nd = 0; // Newer Files Dev.
		
			$p = 0;
			$up = 0;
			$np = 0;
			
			foreach($prod_folders_to_check as $folder) {
				$dir = new Folder($folder);
				$tree = $dir->tree(null, ['.htaccess','error_log'])[1];
				
				sort($tree);
				foreach ($tree as $entry) {
					$file = new File($entry);
					preg_match('/.*production(.*)/', $entry, $filename);
					$filename = $filename[1];
					$date = Time::createFromTimestamp(round($file->lastChange()/60)*60);
					$files[$filename]['prod_date'] = $date;
		
					if(!empty($files[$filename]['dev_date'])) {
						$ud--;
						if($date < $files[$filename]['dev_date']) $nd++;
						elseif($date > $files[$filename]['dev_date']) $np++;
						else unset($files[$filename]);
					} else {
						$up++;
					}
					$p++;
				}
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

		// DELETE FILE FROM PRODUCTION
		public function delete($system, $path) {
			$path = str_replace('___', '/', $path);
			$file = new File('../../'. $system . $path);
			if($file->delete()) {
				$this->Flash->success(__('File removed successfully.'));
			} else {
				$this->Flash->error(__('Unable remove file.'));
			}
			return $this->redirect($this->referer());
		}
		
		// UPLOAD FILE TO SYSTEM SPECIFIED
		public function upload($system, $path) {
			// UPLOAD THE FILE TO THE RIGHT SYSTEM
			if($system == 'production') $other = 'development';
			else $other = 'production';
			
			$path = str_replace('___', '/', $path);
			$file = new File('../../'. $other . $path);
			$file2 = new File('../../'. $system. $path);
			if(!$file2->exists()) {
				$dirs = explode('/', $path);
				$prod = new Folder('../../'. $system);
				for($i = 0; $i < sizeof($dirs)-1; $i++) {
					if(!$prod->cd($dirs[$i])) {
						$prod->create($dirs[$i]);
						$prod->cd($dirs[$i]);
					}
				}
			}
			if($file->copy('../../'. $system . $path)) {
				if(touch('../../'. $system . $path, $file->lastChange())) {
					$this->Flash->success(__('File copied successfully.'));
				} else {
					$this->Flash->success(__('File copied successfully, but time not updated.'));
				}
			} else {
				$this->Flash->error(__('Unable copy file. '));
			}
			return $this->redirect($this->referer());
		}
	}
?>
