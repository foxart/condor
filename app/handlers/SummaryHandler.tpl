<?= debug(get_class($this)); ?>
<div style="position: relative; display:block;">
    <div style="position: relative; float: left; width: 49%;">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>User ID</th>
                    <th>Date</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($byCountryList as $item): ?>
                <tr>
                    <td><?= htmlSpecialChars($item->getCountryId()); ?></td>
                    <td><?= htmlSpecialChars($item->getCountryName()); ?></td>
                    <td><?= htmlSpecialChars($item->getCountryCode()); ?></td>
                    <td><?= htmlSpecialChars($item->getSum()); ?></td>
                    <td><?= htmlSpecialChars($item->getCount()); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div style="position: relative; float: right; width: 49%;">
        []
    </div>
</div>
