<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ExpenseTypesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setDisplayField('name');

        $this->hasMany('Expenses');
    }

    public function validationDefault(Validator $validator): Validator
    {
        return $validator;
    }
}
