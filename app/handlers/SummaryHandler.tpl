<?= debug(get_class($this)); ?>
<div style="position: relative; display:block;">
    <div style="position: relative; float: left; width: 49%;">
        <b>By country</b>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Sum</th>
                    <th>Count</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($byCountryList as $item): ?>
                <tr>
                    <td><?= htmlSpecialChars($item->getCountry()->getId()); ?></td>
                    <td><?= htmlSpecialChars($item->getCountry()->getName()); ?></td>
                    <td><?= htmlSpecialChars($item->getCountry()->getCode()); ?></td>
                    <td><?= htmlSpecialChars($item->getSum()); ?></td>
                    <td><?= htmlSpecialChars($item->getCount()); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div style="position: relative; float: right; width: 49%;">
        <b>By user</b>
        <?php foreach ($byUserList as $userList): ?>
        <div style="display: block; overflow: hidden;">
            <div style="position: relative; float: left; width: 49%;">
                <div>
                    User: <?= $userList->getUser()->getFirstname(); ?>
                    <?= $userList->getUser()->getLastname(); ?>
                    [<b><?= $userList->getUser()->getStatus()->getName(); ?></b>]
                </div>
                <div>
                    Country: <?= $userList->getUser()->getCountry()->getName(); ?>
                </div>
                <div>
                    Total: <?= $userList->getSum(); ?> of <?= $userList->getCount(); ?> transactions
                </div>
            </div>
            <table style="position: relative; float: right; width: 49%;">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Sum</th>
                        <th>Count</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($userList->getSummary() as $item): ?>
                    <tr>
                        <td><?= $item->getDate(); ?></td>
                        <td><?= $item->getSum(); ?></td>
                        <td><?= $item->getCount(); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <br/>
        <hr/>
        <?php endforeach; ?>
    </div>
</div>
