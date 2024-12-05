<?= debug(get_class($this)); ?>
<ul>
    <li>
        <a href="<?= $url ?>">all</a>
    </li>
    <?php foreach ($typeList as $type): ?>
    <li>
        <a href="<?= $url . '?type=' . htmlSpecialChars($type) ?>">
            <?= htmlSpecialChars($type) ?>
        </a>
    </li>
    <?php endforeach; ?>
</ul>

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
        <?php foreach ($transactionList as $transaction): ?>
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
