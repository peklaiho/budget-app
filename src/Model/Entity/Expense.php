<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Expense extends Entity
{
    protected $_accessible = [
        'account_id' => true,
        'expense_type_id' => true,
        'date' => true,
        'amount' => true,
        'description' => true,
    ];
}
