<h2><?= $this->fetch('title') ?></h2>

<div class="row mt-4">
    <div class="col-6">
        <?= $this->Form->create($transfer) ?>
        <div class="form-group">
            <?= $this->Form->label('from_account_id') ?>
            <?php if ($this->Form->isFieldError('from_account_id')): ?>
                <span class="badge badge-danger">Error</span>
            <?php endif; ?>
            <?= $this->Form->select('from_account_id', $accounts->combine('id', 'name'), ['class' => 'form-control']) ?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('to_account_id') ?>
            <?php if ($this->Form->isFieldError('to_account_id')): ?>
                <span class="badge badge-danger">Error</span>
            <?php endif; ?>
            <?= $this->Form->select('to_account_id', $accounts->combine('id', 'name'), ['class' => 'form-control']) ?>
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
            <?= $this->Html->link('Back', ['controller' => 'Transfers', 'action' => 'index'], ['class' => 'btn btn-secondary ml-2']) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>