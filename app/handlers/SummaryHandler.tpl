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
                    <td><?= htmlSpecialChars($item->getUser()->getCountry()->getId()); ?></td>
                    <td><?= htmlSpecialChars($item->getUser()->getCountry()->getName()); ?></td>
                    <td><?= htmlSpecialChars($item->getUser()->getCountry()->getCode()); ?></td>
                    <td><?= htmlSpecialChars($item->getSum()); ?></td>
                    <td><?= htmlSpecialChars($item->getCount()); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div style="position: relative; float: right; width: 49%;">
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
                <?php foreach ($byUserMonth as $byMonth): ?>
                    <?php foreach ($byMonth as $item): ?>
                        <?= debug($item->getUser()->getUsername()); ?>
                        <?= debug($item->getMonth()); ?>
                        <?= debug($item->getSum()); ?>
                        <?= debug($item->getCount()); ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
