<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ExpensesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setDisplayField('description');

        $this->belongsTo('Accounts');
        $this->belongsTo('ExpenseTypes');
    }

    public function validationDefault(Validator $validator): Validator
    {
        return $validator;
    }
}
