<table class="table table-sm">
    <thead>
        <tr>
            <th>Date</th>
            <th>Type</th>
            <th class="text-right">Amount</th>
            <th>Description</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($expenses as $expense): ?>
            <tr>
                <td><?= $expense->date->i18nFormat('d.M.YYYY') ?></td>
                <td><?= $expense->expense_type->name ?></td>
                <td class="text-right"><?= $expense->amount ?></td>
                <td><?= $expense->description ?></td>
                <td><button type="button" class="btn btn-secondary btn-sm">Edit</button></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="paginator">
    <span>Page:</span>
    <?= $this->Paginator->numbers(['first' => 1, 'last' => 1]) ?>
</div>