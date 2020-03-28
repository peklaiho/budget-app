<?php
declare(strict_types=1);

namespace App\Controller;

class ExpensesController extends AppController
{
    public function index()
    {
        $query = $this->Expenses->find()
            ->contain(['Accounts', 'ExpenseTypes'])
            ->order([
                'Expenses.date' => 'DESC',
                'Expenses.id' => 'DESC'
            ]);

        $account = $this->request->getQuery('account');
        if ($account) {
            $query->where(['account_id' => $account]);
        }

        $type = $this->request->getQuery('type');
        if ($type) {
            $query->where(['expense_type_id' => $type]);
        }

        $search = $this->request->getQuery('search');
        if ($search) {
            $query->where(fn ($exp, $q) => $exp->like('description', "%$search%"));
        }

        $this->loadModel('ExpenseTypes');
        $types = $this->ExpenseTypes->find()
            ->order(['name' => 'ASC']);

        $this->loadModel('Accounts');
        $accounts = $this->Accounts->find()
            ->order(['name' => 'ASC']);

        $this->set('expenses', $this->paginate($query));
        $this->set('types', $types);
        $this->set('accounts', $accounts);
    }

    public function add()
    {
        $expense = $this->Expenses->newEmptyEntity();

        $this->addOrEdit($expense);
    }

    public function edit($id)
    {
        $expense = $this->Expenses->get($id);

        $this->addOrEdit($expense);
    }

    private function addOrEdit($expense)
    {
        $this->loadModel('ExpenseTypes');
        $types = $this->ExpenseTypes->find()
            ->order(['name' => 'ASC']);

        $this->loadModel('Accounts');
        $accounts = $this->Accounts->find()
            ->order(['name' => 'ASC']);

        if ($this->request->is(['post', 'put'])) {
            $isNew = $expense->isNew();
            $expense = $this->Expenses->patchEntity($expense, $this->request->getData());

            if ($this->Expenses->save($expense)) {
                if ($isNew) {
                    $this->Flash->success(__('New expense created.'));
                } else {
                    $this->Flash->success(__('Expense modified.'));
                }

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Error while saving expense.'));
            }
        }

        $this->set('expense', $expense);
        $this->set('types', $types);
        $this->set('accounts', $accounts);
    }
}
