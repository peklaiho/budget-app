<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Accounts seed.
 */
class AccountsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => 1, 'name' => 'Cash', 'start_money' => 0],
            ['id' => 2, 'name' => 'Bank', 'start_money' => 0],
            ['id' => 3, 'name' => 'Investment', 'start_money' => 0],
        ];

        $table = $this->table('accounts');
        $table->insert($data)->save();
    }
}
