<?php
	namespace SiteManager\Controller;

	use SiteManager\Controller\AppController;
  	use Migrations\Migrations;

	class TablesController extends AppController
	{
	    public function index()
	    {
        $user_migrations = new Migrations(['source' => '../plugins/CakeDC/Users/config/Migrations']);
        $status = $user_migrations->status();
		
		if(!empty($status)) {
          $this->set('user_status', $status);
        }
		
		$sitemgr = new Migrations(['source' => '../plugins/SiteManager/config/Migrations']);
        $status = $sitemgr->status();

        if(!empty($status)) {
          $this->set('sitemgr', $status);
        }
		
		$local = new Migrations(['source' => '../config/Migrations']);
        $status = $local->status();

        if(!empty($status)) {
          $this->set('local', $status);
        }
      }

      public function setup($table = null) {
        if($table == 'user') {
          $source = '../plugins/CakeDC/Users/config/Migrations';
        } else if($table == 'sitemgr') {
          $source = '../plugins/SiteManager/config/Migrations';
        } else if($table == 'local') {
          $source = '../config/Migrations';
        }
		
        $migrations = new Migrations(['source' => $source]);
        if($migrations->migrate()) {
          $this->Flash->success('Tables created.');
        } else {
          $this->Flash->error('Table creation failed.');
        }
        $this->redirect('/sitemgr/tables');
      }

      public function remove($table = null) {
        if($table == 'user') {
          $source = '../plugins/CakeDC/Users/config/Migrations';
        } else if($table == 'sitemgr') {
          $source = '../plugins/SiteManager/config/Migrations';
        } else if($table == 'local') {
          $source = '../config/Migrations';
        }
		
        $migrations = new Migrations(['source' => $source]);
        if($migrations->rollback()) {
          $this->Flash->success('Tables removed.');
        } else {
          $this->Flash->error('Table removal failed.');
        }
        $this->redirect('/sitemgr/tables');
      }
	}
?>
