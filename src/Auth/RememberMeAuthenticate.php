<?php

namespace App\Auth;

use Cake\Auth\BaseAuthenticate;
use Cake\Controller\ComponentRegistry;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Network\Request;
use Cake\Network\Response;

class RememberMeAuthenticate extends BaseAuthenticate
{

    /**
     * @return array|bool
     */
    public function authenticate(Request $request, Response $response)
    {
        return $this->getUser($request);
    }

    /**
     * @return void
     */
    public function createRememberMeCookie(Event $event, array $result, BaseAuthenticate $auth)
    {
        $request = $auth->_registry->getController()->request;

        if (isset($request->data['remember_me']) &&
            $request->data['remember_me']
        ) {
            $this->_registry->Cookie->write('RICHTEA', [
                'id' => $result['id'],
                'userAgent' => $request->header('User-Agent')
            ]);
        }
    }

    /**
     * @return void
     */
    public function deleteRememberMeCookie(Event $event)
    {
        if ($this->_registry->Cookie->check('RICHTEA')) {
            $this->_registry->Cookie->delete('RICHTEA');
        }
    }

    /**
     * @return array|bool
     */
    public function getUser(Request $request)
    {
        if (!$this->_registry->Cookie->check('RICHTEA')) {
            return false;
        }

        $cookie = $this->_registry->Cookie->read('RICHTEA');

        $this->config('fields.username', 'id');
        $user = $this->_findUser($cookie['id']);

        if ($user &&
            !empty($cookie['userAgent']) &&
            $request->header('User-Agent') === $cookie['userAgent']
        ) {
            return $user;
        }

        return false;
    }

    /**
     * @return array
     */
    public function implementedEvents()
    {
        return [
            'Auth.afterIdentify' => 'createRememberMeCookie',
            'Auth.logout' => 'deleteRememberMeCookie'
        ];
    }
}
