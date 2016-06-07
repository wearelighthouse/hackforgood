<?php

use Phinx\Seed\AbstractSeed;

class OperationsSeed extends AbstractSeed
{
    /**
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'London Floodings',
                'geolocation' => json_encode([
                    'longitude' => 51.5286416,
                    'latitude' => -0.1015987
                ])
            ]
        ];

        $table = $this->table('operations');
        $table->insert($data)->save();
    }
}
