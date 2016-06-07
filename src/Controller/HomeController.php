<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;

class HomeController extends AppController
{

    /**
     * @return void
     */
    public function display()
    {
        $operation = TableRegistry::get('Operations')->find()->first();

        return $this->redirect([
            'controller' => 'HomeOwners',
            'action' => 'index',
            'operation_id' => $operation->id
        ]);
    }
}
