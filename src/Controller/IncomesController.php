<?php
declare(strict_types=1);

namespace App\Controller;

class IncomesController extends AppController
{
    public function index()
    {
        $query = $this->Incomes->find()
            ->contain(['Accounts', 'IncomeTypes'])
            ->order([
                'Incomes.date' => 'DESC',
                'Incomes.id' => 'DESC'
            ]);

        $account = $this->request->getQuery('account');
        if ($account) {
            $query->where(['account_id' => $account]);
        }

        $type = $this->request->getQuery('type');
        if ($type) {
            $query->where(['income_type_id' => $type]);
        }

        $search = $this->request->getQuery('search');
        if ($search) {
            $query->where(fn ($exp, $q) => $exp->like('description', "%$search%"));
        }

        $this->loadModel('IncomeTypes');
        $types = $this->IncomeTypes->find()
            ->order(['name' => 'ASC'])
            ->all();

        $this->loadModel('Accounts');
        $accounts = $this->Accounts->find()
            ->order(['name' => 'ASC'])
            ->all();

        $this->set('incomes', $this->paginate($query));
        $this->set('types', $types);
        $this->set('accounts', $accounts);
    }

    public function add()
    {
        $income = $this->Incomes->newEmptyEntity();

        $this->addOrEdit($income);
    }

    public function edit($id)
    {
        $income = $this->Incomes->get($id);

        $this->addOrEdit($income);
    }

    private function addOrEdit($income)
    {
        $this->loadModel('IncomeTypes');
        $types = $this->IncomeTypes->find()
            ->order(['name' => 'ASC'])
            ->all();

        $this->loadModel('Accounts');
        $accounts = $this->Accounts->find()
            ->order(['name' => 'ASC'])
            ->all();

        if ($this->request->is(['post', 'put'])) {
            $isNew = $income->isNew();
            $income = $this->Incomes->patchEntity($income, $this->request->getData());

            if ($this->Incomes->save($income)) {
                if ($isNew) {
                    $this->Flash->success(__('New income created.'));
                } else {
                    $this->Flash->success(__('Income modified.'));
                }

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Error while saving income.'));
            }
        }

        $this->set('income', $income);
        $this->set('types', $types);
        $this->set('accounts', $accounts);
    }
}
