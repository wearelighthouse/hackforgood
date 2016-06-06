<?php

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

class OperationsFixture extends TestFixture
{

    public $import = [
        'table' => 'operations'
    ];

    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'name' => 'London Floodings',
                'geolocation' => json_encode([
                    'latitude' => 51.5286416,
                    'longitude' => -0.1015987
                ])
            ]
        ];

        parent::init();
    }
}
