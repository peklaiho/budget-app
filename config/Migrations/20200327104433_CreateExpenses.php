<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateExpenses extends AbstractMigration
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
        $table = $this->table('expenses');
        $table->addColumn('account_id', 'integer');
        $table->addColumn('expense_type_id', 'integer');
        $table->addColumn('date', 'date');
        $table->addColumn('amount', 'decimal', [
            'precision' => 10,
            'scale' => 2
        ]);
        $table->addColumn('description', 'string', [
            'limit' => 128
        ]);
        $table->addColumn('tx_id', 'string', [
            'limit' => 32,
            'null' => true,
            'default' => null
        ]);
        $table->addColumn('raw', 'string', [
            'limit' => 255,
            'null' => true,
            'default' => null
        ]);

        $table->addForeignKey('account_id', 'accounts', 'id');
        $table->addForeignKey('expense_type_id', 'expense_types', 'id');

        $table->addIndex(['tx_id'], [
            'unique' => true
        ]);

        $table->create();
    }
}
