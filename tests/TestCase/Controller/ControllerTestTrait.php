<?php

namespace App\Test\TestCase\Controller;

trait ControllerTestTrait
{

    public $fixtures = [
        'app.operations',
        'app.home_owners'
    ];

    /**
     * Sets session up for Auth component
     *
     * @param $id The id of the login
     * @return void
     */
    private function _setAuthSession($id)
    {
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => $id
                ]
            ]
        ]);
    }

    /**
     * @return void
     */
    private function _setAjaxRequest()
    {
        $_ENV['HTTP_X_REQUESTED_WITH'] = 'XMLHttpRequest';

        $this->configRequest([
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);
    }
}
