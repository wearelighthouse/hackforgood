<?php

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

class HomeOwnersFixture extends TestFixture
{

    public $import = [
        'table' => 'home_owners'
    ];

    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'name' => 'Christy Quinn',
                'operation_id' => 1,
                'street_address' => '1 Masefield court',
                'geolocation' => json_encode([
                    'latitude' => 51.5286416,
                    'longitude' => -0.1015987
                ])
            ]
        ];

        parent::init();
    }
}
