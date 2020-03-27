<?php
declare(strict_types=1);

namespace App\Controller;

class ExpensesController extends AppController
{
    public function index()
    {
        $expenses = $this->Expenses->find()
            ->contain('ExpenseTypes')
            ->order([
                'Expenses.date' => 'DESC',
                'Expenses.id' => 'DESC'
            ]);

        $this->set('expenses', $this->paginate($expenses));
    }
}
