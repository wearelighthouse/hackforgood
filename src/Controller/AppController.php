<?php

namespace App\Controller;

use Cake\Controller\Controller;

class AppController extends Controller
{

    /**
     * @return void
     */
    public function initialize()
    {
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'email']
                ]
            ]
        ]);
        $this->loadComponent('Flash');
    }
}
