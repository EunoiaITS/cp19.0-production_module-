<?php
use Migrations\AbstractMigration;

class ChangeMrTable2 extends AbstractMigration
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
        $table->removeColumn('so_no')->save();
    }
}
