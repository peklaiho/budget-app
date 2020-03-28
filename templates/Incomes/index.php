<div class="row">
    <div class="col-6">
        <h2>Income</h2>
    </div>
    <div class="col-6 text-right">
        <?= $this->Html->link('New income', ['controller' => 'Incomes', 'action' => 'add'], ['class' => 'btn btn-primary']) ?>
    </div>
</div>

<?= $this->Form->create(null, ['type' => 'get', 'valueSources' => ['query']]); ?>

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
        <tr>
            <td></td>
            <td>
                <?= $this->Form->select('account', $accounts->combine('id', 'name'), ['class' => 'form-control', 'empty' => 'All']) ?>
            </td>
            <td>
                <?= $this->Form->select('type', $types->combine('id', 'name'), ['class' => 'form-control', 'empty' => 'All']) ?>
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
        <?php foreach ($incomes as $income): ?>
            <tr>
                <td><?= $income->date->i18nFormat('d.M.YYYY') ?></td>
                <td><?= $income->account->name ?></td>
                <td><?= $income->income_type->name ?></td>
                <td class="text-right"><?= number_format($income->amount, 2, '.', ' ') ?></td>
                <td><?= $income->description ?></td>
                <td><?= $this->Html->link('Edit', ['controller' => 'Incomes', 'action' => 'edit', $income->id], ['class' => 'btn btn-secondary btn-sm']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->Form->end(); ?>

<div class="paginator">
    <span>Page:</span>
    <?= $this->Paginator->numbers(['first' => 1, 'last' => 1]) ?>
</div>