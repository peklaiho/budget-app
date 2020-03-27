<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateAccounts extends AbstractMigration
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
        $table = $this->table('accounts');
        $table->addColumn('name', 'string', [
            'limit' => 32
        ]);
        $table->addColumn('start_money', 'decimal', [
            'precision' => 10,
            'scale' => 2
        ]);
        $table->create();
    }
}
