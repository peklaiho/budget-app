<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * ExpenseTypes seed.
 */
class ExpenseTypesSeed extends AbstractSeed
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
    public function run(): void
    {
        $data = [
            // This has to be added manually because auto-increment starts at 1 :(
            // ['id' => 0, 'name' => 'Undefined', 'common' => 0],
            ['id' => 1, 'name' => 'Borrowing', 'common' => 0],
            ['id' => 2, 'name' => 'Clothes', 'common' => 1],
            ['id' => 3, 'name' => 'Communications', 'common' => 1],
            ['id' => 4, 'name' => 'Entertainment', 'common' => 1],
            ['id' => 5, 'name' => 'Finance', 'common' => 1],
            ['id' => 6, 'name' => 'Food (Restairant)', 'common' => 1],
            ['id' => 7, 'name' => 'Food (Store)', 'common' => 1],
            ['id' => 8, 'name' => 'Gambling', 'common' => 0],
            ['id' => 9, 'name' => 'General', 'common' => 1],
            ['id' => 10, 'name' => 'Hobby', 'common' => 0],
            ['id' => 11, 'name' => 'Insurance', 'common' => 0],
            ['id' => 12, 'name' => 'Investment', 'common' => 0],
            ['id' => 13, 'name' => 'Living', 'common' => 1],
            ['id' => 14, 'name' => 'Loan (Give)', 'common' => 0],
            ['id' => 15, 'name' => 'Loan (Payment)', 'common' => 0],
            ['id' => 16, 'name' => 'Taxes', 'common' => 0],
            ['id' => 17, 'name' => 'Transportation', 'common' => 1],
            ['id' => 18, 'name' => 'Health', 'common' => 1],
            ['id' => 19, 'name' => 'Furniture', 'common' => 0],
            ['id' => 20, 'name' => 'Rent', 'common' => 1],
            ['id' => 21, 'name' => 'Beauty', 'common' => 1],
            ['id' => 22, 'name' => 'Hygiene', 'common' => 0],
            ['id' => 23, 'name' => 'Reading', 'common' => 0],
            ['id' => 24, 'name' => 'Gift', 'common' => 0],
            ['id' => 25, 'name' => 'Electricity', 'common' => 0],
            ['id' => 26, 'name' => 'Water', 'common' => 0],
            ['id' => 27, 'name' => 'Travel', 'common' => 1],
            ['id' => 28, 'name' => 'Tools', 'common' => 0],
            ['id' => 29, 'name' => 'Books', 'common' => 0],
            ['id' => 30, 'name' => 'Car: Gasoline', 'common' => 1],
            ['id' => 31, 'name' => 'Car: Repairs', 'common' => 0],
            ['id' => 32, 'name' => 'Car: Purchase', 'common' => 0],
            ['id' => 33, 'name' => 'Car: Parking', 'common' => 1],
            ['id' => 34, 'name' => 'Car: Parts', 'common' => 0],
            ['id' => 35, 'name' => 'Car: Mandatory Inspection', 'common' => 0],
            ['id' => 36, 'name' => 'Business', 'common' => 0],
            ['id' => 37, 'name' => 'Charity', 'common' => 0],
            ['id' => 38, 'name' => 'Dating', 'common' => 0],
            ['id' => 39, 'name' => 'Plants', 'common' => 0],
        ];

        $table = $this->table('expense_types');
        $table->insert($data)->save();
    }
}
