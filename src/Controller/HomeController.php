<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\ConnectionManager;

class HomeController extends AppController
{
    public function index()
    {
        $conn = ConnectionManager::get('default');

        $sql = "SELECT ac.id, ac.name, ac.start_money, " .
            "(SELECT SUM(amount) FROM expenses AS e WHERE e.account_id = ac.id) as expenses, " .
            "(SELECT SUM(amount) FROM incomes AS i WHERE i.account_id = ac.id) as income, " .
            "(SELECT SUM(amount) FROM transfers AS tf WHERE tf.from_account_id = ac.id) as transfer_from, " .
            "(SELECT SUM(amount) FROM transfers AS tf WHERE tf.to_account_id = ac.id) as transfer_to " .
            "FROM accounts AS ac ORDER BY ac.name";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll('assoc');

        $accounts = [];

        foreach ($rows as $row) {
            $accounts[] = [
                'id' => $row['id'],
                'name' => $row['name'],
                'balance' => $row['start_money'] + $row['income'] + $row['transfer_to'] - $row['expenses'] - $row['transfer_from']
            ];
        }

        $this->set('accounts', $accounts);
    }
}
