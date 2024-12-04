<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    td {
        border: solid 1px black;
        border-collapse: collapse;
    }
</style>

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
            <td><?= $transaction->getId(); ?></td>
            <td><?= $transaction->getType(); ?></td>
            <td><?= $transaction->getUserId(); ?></td>
            <td><?= $transaction->getDate(); ?></td>
            <td><?= $transaction->getAmount(); ?></td>
            <td><?= $transaction->getCurrency(); ?></td>
            <td><?= $transaction->isProcessed() ? 'Yes' : 'No'; ?></td>
            <td><?= $transaction->getDetails(); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
