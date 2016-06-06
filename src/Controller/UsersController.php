<?php

namespace App\Controller;

class UsersController extends AppController
{

    /**
     * @return void
     */
    public function login()
    {
        $login = $this->Users->newEntity();

        if ($this->request->is('post')) {
            $login = $this->Auth->identify();

            if ($login) {
                $this->Auth->setUser($login);

                return $this->redirect($this->Auth->redirectUrl());
            }

            $this->Flash->error('Invalid email or password, please try again');
        }

        $this->set('login', $login);
    }

    /**
     * @return void
     */
    public function logout()
    {
        $logoutRedirect = $this->Auth->logout();

        return $this->redirect($logoutRedirect);
    }
}
