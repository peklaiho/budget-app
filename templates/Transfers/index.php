<div class="row">
    <div class="col-6">
        <h2>Transfers</h2>
    </div>
    <div class="col-6 text-right">
        <?= $this->Html->link('New transfer', ['controller' => 'Transfers', 'action' => 'add'], ['class' => 'btn btn-primary']) ?>
    </div>
</div>

<?= $this->Form->create(null, ['type' => 'get', 'valueSources' => ['query']]); ?>

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
        <tr>
            <td></td>
            <td>
                <?= $this->Form->select('from_account', $accounts->combine('id', 'name'), ['class' => 'form-control', 'empty' => 'All']) ?>
            </td>
            <td>
                <?= $this->Form->select('to_account', $accounts->combine('id', 'name'), ['class' => 'form-control', 'empty' => 'All']) ?>
            </td>
            <td></td>
            <td>
                <?= $this->Form->text('search', ['class' => 'form-control', 'placeholder' => 'Search...']) ?>
            </td>
            <td>
                <button class="btn btn-secondary btn-sm" type="submit">Update</button>
            </td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($transfers as $transfer): ?>
            <tr>
                <td><?= $transfer->date->i18nFormat('d.M.yyyy') ?></td>
                <td><?= $transfer->from_account->name ?></td>
                <td><?= $transfer->to_account->name ?></td>
                <td class="text-right"><?= number_format($transfer->amount, 2, '.', ' ') ?></td>
                <td><?= $transfer->description ?></td>
                <td><?= $this->Html->link('Edit', ['controller' => 'Transfers', 'action' => 'edit', $transfer->id], ['class' => 'btn btn-secondary btn-sm']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->Form->end(); ?>

<div class="paginator">
    <span>Page:</span>
    <?= $this->Paginator->numbers(['first' => 1, 'last' => 1]) ?>
</div>