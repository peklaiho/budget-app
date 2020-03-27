<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateIncomes extends AbstractMigration
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
        $table = $this->table('incomes');
        $table->addColumn('account_id', 'integer');
        $table->addColumn('income_type_id', 'integer');
        $table->addColumn('date', 'date');
        $table->addColumn('amount', 'decimal', [
            'precision' => 10,
            'scale' => 2
        ]);
        $table->addColumn('description', 'string', [
            'limit' => 128
        ]);

        $table->addForeignKey('account_id', 'accounts', 'id');
        $table->addForeignKey('income_type_id', 'income_types', 'id');

        $table->create();
    }
}
