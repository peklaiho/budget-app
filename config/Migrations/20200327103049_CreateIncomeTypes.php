<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateIncomeTypes extends AbstractMigration
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
        $table = $this->table('income_types');
        $table->addColumn('name', 'string', [
            'limit' => 32
        ]);
        $table->create();
    }
}
