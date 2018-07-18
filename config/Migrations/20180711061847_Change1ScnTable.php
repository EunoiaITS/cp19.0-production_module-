<?php
use Migrations\AbstractMigration;

class Change1ScnTable extends AbstractMigration
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
        $table->addColumn('final_approved_by', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
            'after'=>'approved_by',
        ])->update();
    }
}
