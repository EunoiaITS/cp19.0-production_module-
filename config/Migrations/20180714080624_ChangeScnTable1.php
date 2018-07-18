<?php
use Migrations\AbstractMigration;

class ChangeScnTable1 extends AbstractMigration
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
        $table = $this->table('scn');
        $table->addColumn('so_no', 'string', [
            'default' => null,
            'limit' => 191,
            'null' => false,
            'after'=>'id',
        ])->update();
    }
}
