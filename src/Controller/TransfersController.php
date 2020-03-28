<?php
declare(strict_types=1);

namespace App\Controller;

class TransfersController extends AppController
{
    public function index()
    {
        $transfers = $this->Transfers->find()
            ->contain(['FromAccounts', 'ToAccounts'])
            ->order([
                'Transfers.date' => 'DESC',
                'Transfers.id' => 'DESC'
            ]);

        $this->set('transfers', $this->paginate($transfers));
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
            ->order(['name' => 'ASC']);

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
