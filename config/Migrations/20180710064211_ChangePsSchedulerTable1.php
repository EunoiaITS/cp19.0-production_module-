<?php
use Migrations\AbstractMigration;

class ChangePsSchedulerTable1 extends AbstractMigration
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
        $table = $this->table('ps_scheduler');
        $table->addColumn('actual_plan','integer',[
            'default' => null,
            'limit' => 11,
        ])->update();
    }
}
