<?php

namespace App\Model\Table;

use Cake\Database\Schema\Table as Schema;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class HomeOwnersTable extends Table
{

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
            ->requirePresence('email', 'create')
            ->notEmpty('email');

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

    /**
     * @return \Cake\Database\Schema\Table
     */
    protected function _initializeSchema(Schema $schema)
    {
        $schema->columnType('assessment', 'json');
        $schema->columnType('geolocation', 'json');
        
        return $schema;
    }
}
