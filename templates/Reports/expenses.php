<h2>Expenses for <?= $year ?></h2>

<table class="table table-sm mt-4">
    <thead>
        <tr>
            <th>Type</th>
            <th class="text-right">Jan</th>
            <th class="text-right">Feb</th>
            <th class="text-right">Mar</th>
            <th class="text-right">Apr</th>
            <th class="text-right">May</th>
            <th class="text-right">Jun</th>
            <th class="text-right">Jul</th>
            <th class="text-right">Aug</th>
            <th class="text-right">Sep</th>
            <th class="text-right">Oct</th>
            <th class="text-right">Nov</th>
            <th class="text-right">Dec</th>
            <th class="text-right">Total</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rows as $row): ?>
            <tr>
                <td class="small">
                    <?php echo $row['name']; $total = 0; ?>
                </td>
                <?php for ($i = 1; $i <= 12; $i++): ?>
                    <td class="text-right small">
                        <?php if ($row["m$i"] > 0) {
                            echo number_format($row["m$i"], 2, '.', ' ');
                            $total += $row["m$i"];
                        } ?>
                    </td>
                <?php endfor; ?>
                <td class="text-right small">
                    <?php if ($total > 0) {
                        echo number_format($total, 2, '.', ' ');
                    } ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Total</th>
            <?php for ($i = 1; $i <= 12; $i++): ?>
                <th class="text-right small">
                    <?php $total = 0;
                        foreach ($rows as $row) {
                            $total += $row["m$i"];
                        }
                        if ($total > 0) {
                            echo number_format($total, 2, '.', ' ');
                    } ?>
                </th>
            <?php endfor; ?>
            <th></th>
        </tr>
    </tfoot>
</table>

<div>
    <?= $this->Html->link('Back', ['controller' => 'Reports', 'action' => 'index'], ['class' => 'btn btn-secondary ml-2']) ?>
</div>