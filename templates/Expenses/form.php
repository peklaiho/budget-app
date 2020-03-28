<h2><?= $this->fetch('title') ?></h2>

<div class="row mt-4">
    <div class="col-6">
        <?= $this->Form->create($expense) ?>
        <div class="form-group">
            <?= $this->Form->label('account_id') ?>
            <?php if ($this->Form->isFieldError('account_id')): ?>
                <span class="badge badge-danger">Error</span>
            <?php endif; ?>
            <?= $this->Form->select('account_id', $accounts->combine('id', 'name'), ['class' => 'form-control']) ?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('expense_type_id') ?>
            <?php if ($this->Form->isFieldError('expense_type_id')): ?>
                <span class="badge badge-danger">Error</span>
            <?php endif; ?>
            <?= $this->Form->select('expense_type_id', $types->combine('id', 'name'), ['class' => 'form-control']) ?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('date') ?>
            <?php if ($this->Form->isFieldError('date')): ?>
                <span class="badge badge-danger">Error</span>
            <?php endif; ?>
            <?= $this->Form->date('date', ['class' => 'form-control']) ?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('amount') ?>
            <?php if ($this->Form->isFieldError('amount')): ?>
                <span class="badge badge-danger">Error</span>
            <?php endif; ?>
            <?= $this->Form->number('amount', ['class' => 'form-control']) ?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('description') ?>
            <?php if ($this->Form->isFieldError('description')): ?>
                <span class="badge badge-danger">Error</span>
            <?php endif; ?>
            <?= $this->Form->text('description', ['class' => 'form-control']) ?>
        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit">Save</button>
            <?= $this->Html->link('Back', ['controller' => 'Expenses', 'action' => 'index'], ['class' => 'btn btn-secondary ml-2']) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>