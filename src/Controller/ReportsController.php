<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\ConnectionManager;

class ReportsController extends AppController
{
    public function index()
    {

    }

    public function expenses()
    {
        $year = $this->request->getQuery('year');
        if (!$year) {
            $year = date('Y');
        }

        $conn = ConnectionManager::get('default');

        $sql = "SELECT t.name";
        for ($i = 1; $i <= 12; $i++) {
            $sql .= ", (SELECT SUM(amount) FROM expenses WHERE expense_type_id = t.id AND YEAR(date) = $year AND MONTH(date) = $i) AS m$i";
        }
        $sql .= " FROM expense_types AS t ORDER BY t.name";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll('assoc');

        $this->set('rows', $rows);
    }
}
