<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * IncomeTypes seed.
 */
class IncomeTypesSeed extends AbstractSeed
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
            ['id' => 1, 'name' => 'Borrowing payment'],
            ['id' => 2, 'name' => 'Finance'],
            ['id' => 3, 'name' => 'Gambling'],
            ['id' => 4, 'name' => 'Gift'],
            ['id' => 5, 'name' => 'Investment'],
            ['id' => 6, 'name' => 'Loan (Take)'],
            ['id' => 7, 'name' => 'Loan (Payment)'],
            ['id' => 8, 'name' => 'Tax return'],
            ['id' => 9, 'name' => 'Wage'],
            ['id' => 10, 'name' => 'Dividend'],
            ['id' => 11, 'name' => 'General'],
        ];

        $table = $this->table('income_types');
        $table->insert($data)->save();
    }
}
