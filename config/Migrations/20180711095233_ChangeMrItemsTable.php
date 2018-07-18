<?php
use Migrations\AbstractMigration;

class ChangeMrItemsTable extends AbstractMigration
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
        $table = $this->table('mr_items');
        $table->removeColumn('quantity')->save();
        $table->addColumn('quantity', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
            'after'=>'part_desc',
        ])->update();
    }
}
