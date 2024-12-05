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
        <?php foreach ($byUserList as $userList): ?>
        <table>
            <thead>
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Country</th>
                    <th>Status</th>
                    <th>Total sum</th>
                    <th>Total count</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $userList->getUser()->getFirstname(); ?></td>
                    <td><?= $userList->getUser()->getLastname(); ?></td>
                    <td><?= $userList->getUser()->getCountry()->getName(); ?></td>
                    <td><?= $userList->getUser()->getStatus()->getName(); ?></td>
                    <td><?= $userList->getSum(); ?></td>
                    <td><?= $userList->getCount(); ?></td>
                </tr>
            </tbody>
        </table>
        <div>
        </div>
        <table>
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
        <br/>
        <hr/>
        <?php endforeach; ?>
    </div>
</div>
