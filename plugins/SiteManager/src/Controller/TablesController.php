<?php
	namespace SiteManager\Controller;

	use SiteManager\Controller\AppController;
  	use Migrations\Migrations;

	class TablesController extends AppController
	{
		// TODO - If User management isn't turned on yet, any user needs to be able to do this.
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
      }

      public function setup($table = null) {
        if($table == 'user') {
          $source = '../plugins/CakeDC/Users/config/Migrations';
        } else if($table == 'sitemgr') {
          $source = '../plugins/SiteManager/config/Migrations';
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
