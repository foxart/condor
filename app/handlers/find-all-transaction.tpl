<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Type</th>
            <th>User ID</th>
            <th>Date</th>
            <th>Amount</th>
            <th>Currency</th>
            <th>Processed</th>
            <th>Details</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($transactions as $transaction): ?>
        <tr>
            <td><?= htmlSpecialChars($transaction->getId()); ?></td>
            <td><?= htmlSpecialChars($transaction->getType()); ?></td>
            <td><?= htmlSpecialChars($transaction->getUserId()); ?></td>
            <td><?= htmlSpecialChars($transaction->getDate()); ?></td>
            <td><?= htmlSpecialChars($transaction->getAmount()); ?></td>
            <td><?= htmlSpecialChars($transaction->getCurrency()); ?></td>
            <td><?= htmlSpecialChars($transaction->isProcessed()) ? 'Yes' : 'No'; ?></td>
            <td><?= htmlSpecialChars($transaction->getDetails() ?? ''); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
