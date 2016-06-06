<?php

namespace App\Test\TestCase\Controller;

use App\Test\TestCase\Controller\ControllerTestTrait;

use Cake\TestSuite\IntegrationTestCase;

class HomeOwnersControllerTest extends IntegrationTestCase
{

    use ControllerTestTrait;

    /**
     * @return void
     */
    public function testAddGet()
    {
        $this->_setAuthSession(1);

        $this->get('/operations/1/home-owners/add');

        $this->assertResponseCode(200);
    }

    /**
     * @return void
     */
    public function testAddBadData()
    {
        $this->_setAuthSession(1);

        $this->post('/operations/1/home-owners/add', [
            'name' => ''
        ]);

        $this->assertResponseCode(200);
        $this->assertNoRedirect();
    }

    /**
     * @return void
     */
    public function testAddPost()
    {
        $this->_setAuthSession(1);

        $this->post('/operations/1/home-owners/add', [
            'name' => 'New Home Owner',
            'street_address' => 'Some street address',
            'geolocation' => [
                'latitude' => 123,
                'longitude' => 1231
            ]
        ]);

        $this->assertRedirect([
            'controller' => 'HomeOwners',
            'action' => 'index',
            'operation_id' => 1
        ]);
    }

    /**
     * @return void
     */
    public function testEditBadData()
    {
        $this->_setAuthSession(1);

        $this->put('/operations/1/home-owners/1', [
            'name' => ''
        ]);

        $this->assertResponseCode(200);
        $this->assertNoRedirect();
    }

    /**
     * @return void
     * @group testing
     */
    public function testEditPut()
    {
        $this->_setAuthSession(1);

        $this->put('/operations/1/home-owners/1', [
            'name' => 'A name'
        ]);

        $this->assertRedirect([
            'controller' => 'HomeOwners',
            'action' => 'index',
            'operation_id' => 1
        ]);
    }

    /**
     * @return void
     */
    public function testIndexGet()
    {
        $this->_setAuthSession(1);

        $this->get('/operations/1/home-owners');

        $this->assertResponseCode(200);
    }
}
