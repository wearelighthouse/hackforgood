<?php

namespace App\Controller;

class HomeOwnersController extends AppController
{

    /**
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->_operation = $this->HomeOwners->Operations->get($this->request->params['operation_id']);
    }

    /**
     * @return void
     */
    public function add()
    {
        $homeOwner = $this->HomeOwners->newEntity();

        if ($this->request->is('post')) {
            $this->HomeOwners->patchEntity($homeOwner, $this->request->data);

            $homeOwner->set('operation_id', $this->_operation->id);

            if ($this->HomeOwners->save($homeOwner)) {
                return $this->redirect([
                    'action' => 'index',
                    'operation_id' => $this->_operation->id
                ]);
            }

            $this->Flash->error('There was an error, please try again');
        }

        $this->set('homeOwner', $homeOwner);
    }

    /**
     * @return void
     */
    public function index()
    {
        $homeOwners = $this->HomeOwners->findByOperationId($this->_operation->id);

        $this->set('homeOwners', $homeOwners);
    }
}
