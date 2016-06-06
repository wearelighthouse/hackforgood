<?php
use Migrations\AbstractMigration;

class AddEmailToHomeOwners extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('home_owners');
        $table->addColumn('email', 'string', [
            'after' => 'name',
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->update();
    }
}
