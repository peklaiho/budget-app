<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateTransfers extends AbstractMigration
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
        $table = $this->table('transfers');
        $table->addColumn('from_account_id', 'integer');
        $table->addColumn('to_account_id', 'integer');
        $table->addColumn('date', 'date');
        $table->addColumn('amount', 'decimal', [
            'precision' => 10,
            'scale' => 2
        ]);
        $table->addColumn('description', 'string', [
            'limit' => 128
        ]);

        $table->addForeignKey('from_account_id', 'accounts', 'id');
        $table->addForeignKey('to_account_id', 'accounts', 'id');

        $table->create();
    }
}
