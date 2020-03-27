<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class TransfersTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setDisplayField('description');

        $this->belongsTo('Account', [
            'foreignKey' => 'from_account_id',
            'propertyName' => 'from_account'
        ]);
        $this->belongsTo('Account', [
            'foreignKey' => 'to_account_id',
            'propertyName' => 'to_account'
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        return $validator;
    }
}
