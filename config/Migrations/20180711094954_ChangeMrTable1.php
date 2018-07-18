<?php
use Migrations\AbstractMigration;

class ChangeMrTable1 extends AbstractMigration
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
        $table = $this->table('material_request');
        $table->addColumn('so_no', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
            'after'=>'id',
        ])->update();
    }
}
