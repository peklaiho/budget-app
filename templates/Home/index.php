<h2>Balances</h2>

<div class="row mt-4">
    <div class="col-6">
        <table class="table">
            <thead>
                <tr>
                    <th>Account</th>
                    <th class="text-right">Balance</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($accounts as $account): ?>
                    <tr>
                        <td><?= $account['name'] ?></td>
                        <td class="text-right"><?= number_format($account['balance'], 2, '.', ' ') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>