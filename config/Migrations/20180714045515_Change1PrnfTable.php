<?php
use Migrations\AbstractMigration;

class Change1PrnfTable extends AbstractMigration
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
        $table = $this->table('prnf');
        $table->removeColumn('part_no')->save();
        $table->removeColumn('part_name')->save();
        $table->removeColumn('quantity')->save();
        $table->removeColumn('description')->save();
        $table->removeColumn('document')->save();
        $table->removeColumn('reason')->save();
        $table->removeColumn('remark')->save();
    }
}
