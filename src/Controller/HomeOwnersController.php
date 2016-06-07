<?php

namespace App\Controller;

use Cake\Event\Event;

class HomeOwnersController extends AppController
{

    /**
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('DocuSign');

        $this->_operation = $this->HomeOwners->Operations->get($this->request->params['operation_id']);
    }

    /**
     * @return void
     */
    public function beforeRender(Event $event)
    {
        $this->set('operation', $this->_operation);
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
     * @throws \Cake\Network\Exception
     */
    public function assessment($id)
    {
        $homeOwner = $this->HomeOwners->get($id, [
            'conditions' => [
                'operation_id' => $this->_operation->id
            ]
        ]);

        if (!$homeOwner->envelope_id) {
            return $this->redirect([
                'action' => 'sign',
                'operation_id' => $homeOwner->operation_id,
                'id' => $homeOwner->id
            ]);
        }

        $envelope = $this->DocuSign->envelope($homeOwner);

        if ($envelope->getStatus() !== 'completed') {
            $homeOwner->set('envelope_id', null);
            $homeOwner->set('envelope_status', null);

            $this->HomeOwners->save($homeOwner);

            return $this->redirect([
                'action' => 'sign',
                'operation_id' => $homeOwner->operation_id,
                'id' => $homeOwner->id
            ]);
        } else {
            $homeOwner->set('envelope_status', 'complete');

            $this->HomeOwners->save($homeOwner);
        }

        if ($this->request->is(['patch', 'put'])) {
            $this->HomeOwners->patchEntity($homeOwner, $this->request->data);

            if ($this->HomeOwners->save($homeOwner)) {
                return $this->redirect([
                    'action' => 'index',
                    'operation_id' => $homeOwner->operation_id
                ]);
            }
        }

        $this->set('homeOwner', $homeOwner);
    }

    /**
     * @return void
     * @throws \Cake\Network\Exception
     */
    public function index()
    {
        $homeOwners = $this->HomeOwners->findByOperationId($this->_operation->id);

        $this->set('homeOwners', $homeOwners);
    }

    /**
     * @return void
     */
    public function sign($id)
    {
        $homeOwner = $this->HomeOwners->get($id, [
            'conditions' => [
                'operation_id' => $this->_operation->id
            ]
        ]);

        if ($homeOwner->envelope_id) {
            $envelope = $this->DocuSign->envelope($homeOwner);

            if ($envelope && $envelope->getStatus === 'completed') {
                return $this->redirect([
                    'action' => 'assessment',
                    'operation_id' => $homeOwner->operation_id,
                    'id' => $homeOwner->id
                ]);
            }
        }

        $url = $this->DocuSign->signingUrl($homeOwner);

        if (!$url) {
            $this->Flash->error('There was an error, please try again');

            return $this->redirect([
                'action' => 'index',
                'operation_id' => $homeOwner->id
            ]);
        } else {
            $homeOwner->set('envelope_status', 'incomplete');
            $this->HomeOwners->save($homeOwner);
        }

        return $this->redirect($url);
    }
}
