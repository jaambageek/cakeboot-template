<?php
/**
 * Copyright 2010 - 2015, Cake Development Corporation (http://cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2015, Cake Development Corporation (http://cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 * 
 * Modified by ValliereBrothers
 */

namespace SiteManager\Controller\Traits;

use Cake\Network\Exception\NotFoundException;
use Cake\Network\Response;
use Cake\ORM\TableRegistry;
use Cake\Utility\Inflector;

/**
 * Covers the baked CRUD actions, assumes Bootstrap Modal for add, edit, and view
 * All successful submits redirect to the referer.
 */
trait AjaxCrudTrait
{
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $table = $this->loadModel();
        $tableAlias = $table->alias();
        $this->set($tableAlias, $table);
		$this->set('tableAlias', $tableAlias);
        $this->set('_serialize', [$tableAlias, 'tableAlias']);
    }

    /**
     * View method
     *
     * @param string|null $id entity id.
     * @return void
     * @throws NotFoundException When record not found.
     */
    public function view($id = null)
    {
    	$this->viewBuilder()->layout('ajax');
		
        $table = $this->loadModel();
        $tableAlias = $table->alias();
        $entity = $table->get($id, [
            'contain' => []
        ]);
        $this->set($tableAlias, $entity);
        $this->set('tableAlias', $tableAlias);
        $this->set('_serialize', [$tableAlias, 'tableAlias']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
    	$this->viewBuilder()->layout('ajax');
		
        $table = $this->loadModel();
        $tableAlias = $table->alias();
        $entity = $table->newEntity();
        $this->set($tableAlias, $entity);
        $this->set('tableAlias', $tableAlias);
        $this->set('_serialize', [$tableAlias, 'tableAlias']);
        if (!$this->request->is('post')) {
            return;
        }
        $entity = $table->patchEntity($entity, $this->request->data);
        $singular = Inflector::singularize(Inflector::humanize($tableAlias));
        if ($table->save($entity)) {
            $this->Flash->success(__('The {0} has been saved', $singular));
            return $this->redirect($this->referer());
        }
        $this->Flash->error(__('The {0} could not be saved', $singular));
    }

    /**
     * Edit method
     *
     * @param string|null $id entity id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws NotFoundException When record not found.
     */
    public function edit($id = null)
    {
    	$this->viewBuilder()->layout('ajax');
		
        $table = $this->loadModel();
        $tableAlias = $table->alias();
        $entity = $table->get($id, [
            'contain' => []
        ]);
        $this->set($tableAlias, $entity);
        $this->set('tableAlias', $tableAlias);
        $this->set('_serialize', [$tableAlias, 'tableAlias']);
        if (!$this->request->is(['patch', 'post', 'put'])) {
            return;
        }
        $entity = $table->patchEntity($entity, $this->request->data);
        $singular = Inflector::singularize(Inflector::humanize($tableAlias));
        if ($table->save($entity)) {
            $this->Flash->success(__('The {0} has been saved', $singular));
            return $this->redirect($this->referer());
        }
        $this->Flash->error(__('The {0} could not be saved', $singular));
    }
	
	/**
     * Delete method
     *
     * @param string|null $id entity id.
     * @return Response Redirects to index.
     * @throws NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $table = $this->loadModel();
        $tableAlias = $table->alias();
        $entity = $table->get($id, [
            'contain' => []
        ]);
        $singular = Inflector::singularize(Inflector::humanize($tableAlias));
        if ($table->delete($entity)) {
            $this->Flash->success(__('The {0} has been deleted', $singular));
        } else {
            $this->Flash->error(__('The {0} could not be deleted', $singular));
        }
        return $this->redirect($this->referer());
    }
}
