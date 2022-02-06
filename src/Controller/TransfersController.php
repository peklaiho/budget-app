<?php
declare(strict_types=1);

namespace App\Controller;

class TransfersController extends AppController
{
    public function index()
    {
        $query = $this->Transfers->find()
            ->contain(['FromAccounts', 'ToAccounts'])
            ->order([
                'Transfers.date' => 'DESC',
                'Transfers.id' => 'DESC'
            ]);

        $fromAccount = $this->request->getQuery('from_account');
        if ($fromAccount) {
            $query->where(['from_account_id' => $fromAccount]);
        }

        $toAccount = $this->request->getQuery('to_account');
        if ($toAccount) {
            $query->where(['to_account_id' => $toAccount]);
        }

        $search = $this->request->getQuery('search');
        if ($search) {
            $query->where(fn ($exp, $q) => $exp->like('description', "%$search%"));
        }

        $this->loadModel('Accounts');
        $accounts = $this->Accounts->find()
            ->order(['name' => 'ASC'])
            ->all();

        $this->set('transfers', $this->paginate($query));
        $this->set('accounts', $accounts);
    }

    public function add()
    {
        $transfer = $this->Transfers->newEmptyEntity();

        $this->addOrEdit($transfer);
    }

    public function edit($id)
    {
        $transfer = $this->Transfers->get($id);

        $this->addOrEdit($transfer);
    }

    private function addOrEdit($transfer)
    {
        $this->loadModel('Accounts');
        $accounts = $this->Accounts->find()
            ->order(['name' => 'ASC'])
            ->all();

        if ($this->request->is(['post', 'put'])) {
            $isNew = $transfer->isNew();
            $transfer = $this->Transfers->patchEntity($transfer, $this->request->getData());

            if ($this->Transfers->save($transfer)) {
                if ($isNew) {
                    $this->Flash->success(__('New transfer created.'));
                } else {
                    $this->Flash->success(__('Transfer modified.'));
                }

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Error while saving transfer.'));
            }
        }

        $this->set('transfer', $transfer);
        $this->set('accounts', $accounts);
    }
}
