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
        $validator->add('date', 'custom', [
            'rule' => function ($value, $context) {
                $result = preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', $value);
                return boolval($result);
            },
            'message' => __('Date is not valid')
        ]);

        $validator->add('amount', 'custom', [
            'rule' => function ($value, $context) {
                if (!filter_var($value, FILTER_VALIDATE_FLOAT)) {
                    return false;
                }

                return $value > 0;
            },
            'message' => __('Amount is not valid')
        ]);

        $validator->add('description', 'custom', [
            'rule' => function ($value, $context) {
                return strlen(trim($value)) >= 3;
            },
            'message' => __('Description is not valid')
        ]);

        return $validator;
    }
}
