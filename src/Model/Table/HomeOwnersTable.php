<?php

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class HomeOwnersTable extends Table
{

    use GeolocationTrait;

    /**
     * @return void
     */
    public function initialize(array $config)
    {
        $this->belongsTo('Operations');
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
            ->requirePresence('street_address', 'create')
            ->notEmpty('street_address');

        $validator
            ->requirePresence('geolocation', 'create')
            ->notEmpty('geolocation');

        return $validator;
    }

    /**
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['operation_id'], 'Operations'));

        return $rules;
    }
}
