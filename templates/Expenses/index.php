<div class="row">
    <div class="col-6">
        <h2>Expenses</h2>
    </div>
    <div class="col-6 text-right">
        <?= $this->Html->link('New expense', ['controller' => 'Expenses', 'action' => 'add'], ['class' => 'btn btn-primary']) ?>
    </div>
</div>

<table class="table table-sm mt-4">
    <thead>
        <tr>
            <th>Date</th>
            <th>Account</th>
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
                <td><?= $expense->account->name ?></td>
                <td><?= $expense->expense_type->name ?></td>
                <td class="text-right"><?= number_format($expense->amount, 2, '.', ' ') ?></td>
                <td><?= $expense->description ?></td>
                <td><?= $this->Html->link('Edit', ['controller' => 'Expenses', 'action' => 'edit', $expense->id], ['class' => 'btn btn-secondary btn-sm']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="paginator">
    <span>Page:</span>
    <?= $this->Paginator->numbers(['first' => 1, 'last' => 1]) ?>
</div>