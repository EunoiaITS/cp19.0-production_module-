<?php
use Migrations\AbstractMigration;

class AlterCsn extends AbstractMigration
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
        $table = $this->table('serial_number');
        $table->addColumn('so_no', 'string', ['after' => 'date'])
            ->addIndex(['so_no'], ['unique' => true])
            ->update();
    }
}
