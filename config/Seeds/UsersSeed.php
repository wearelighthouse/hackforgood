<?php

use Cake\Auth\DefaultPasswordHasher;

use Phinx\Seed\AbstractSeed;

class UsersSeed extends AbstractSeed
{
    /**
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Joe Bloggs',
                'email' => 'volunteer@hackforgood.com',
                'password' => (new DefaultPasswordHasher)->hash('password')
            ]
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
