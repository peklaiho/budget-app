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
        $currentYear = date('Y');

        $year = $this->request->getQuery('year');
        if (!$year) {
            $year = $currentYear;
        }

        $conn = ConnectionManager::get('default');

        // Get expense types

        $sql = "SELECT t.name";
        for ($i = 1; $i <= 12; $i++) {
            $sql .= ", (SELECT SUM(amount) FROM expenses WHERE expense_type_id = t.id AND YEAR(date) = $year AND MONTH(date) = $i) AS m$i";
        }
        $sql .= " FROM expense_types AS t ORDER BY t.name";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll('assoc');

        // Get range of years

        $sql = 'SELECT MIN(YEAR(date)) FROM expenses';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $firstYear = $stmt->fetch('num');

        if ($firstYear) {
            $yearRange = range($firstYear[0], $currentYear);
            $years = array_combine($yearRange, $yearRange);
        } else {
            $years = [
                $currentYear => $currentYear
            ];
        }

        $this->set('rows', $rows);
        $this->set('year', $year);
        $this->set('years', $years);
    }
}
