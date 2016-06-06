<?php

namespace App\Model\Table;

use Cake\Database\Schema\Table;

trait GeolocationTrait
{

    /**
     * @return \Cake\Database\Schema\Table
     */
    protected function _initializeSchema(Table $schema)
    {
        $schema->columnType('geolocation', 'json');
        
        return $schema;
    }
}
