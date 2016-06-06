<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class OperationsTable extends Table
{

    use GeolocationTrait;

    /**
     * @return void
     */
    public function initialize(array $config)
    {
        $this->hasMany('HomeOwners');
    }

    /**
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('geolocation', 'create')
            ->notEmpty('geolocation');

        return $validator;
    }
}
