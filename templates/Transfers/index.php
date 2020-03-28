<div class="row">
    <div class="col-6">
        <h2>Transfers</h2>
    </div>
    <div class="col-6 text-right">
        <?= $this->Html->link('New transfer', ['controller' => 'Transfers', 'action' => 'add'], ['class' => 'btn btn-primary']) ?>
    </div>
</div>

<table class="table table-sm mt-4">
    <thead>
        <tr>
            <th>Date</th>
            <th>From</th>
            <th>To</th>
            <th class="text-right">Amount</th>
            <th>Description</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($transfers as $transfer): ?>
            <tr>
                <td><?= $transfer->date->i18nFormat('d.M.YYYY') ?></td>
                <td><?= $transfer->from_account->name ?></td>
                <td><?= $transfer->to_account->name ?></td>
                <td class="text-right"><?= number_format($transfer->amount, 2, '.', ' ') ?></td>
                <td><?= $transfer->description ?></td>
                <td><?= $this->Html->link('Edit', ['controller' => 'Transfers', 'action' => 'edit', $transfer->id], ['class' => 'btn btn-secondary btn-sm']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="paginator">
    <span>Page:</span>
    <?= $this->Paginator->numbers(['first' => 1, 'last' => 1]) ?>
</div>