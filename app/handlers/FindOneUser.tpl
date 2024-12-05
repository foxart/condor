<?= debug(get_class($this)); ?>
<div style="position: relative; display:block;">
    <div style="position: relative; float: left; width: 49%;">
        <table>
            <thead>
                <tr>
                    <th>Key</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>ID</td>
                    <td><?= htmlSpecialChars($user->getId()); ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?= htmlSpecialChars($user->getEmail()); ?></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><?= htmlSpecialChars($user->getUsername()); ?></td>
                </tr>
                <tr>
                    <td>Firstname</td>
                    <td><?= htmlSpecialChars($user->getFirstname()); ?></td>
                </tr>
                <tr>
                    <td>Lastname</td>
                    <td><?= htmlSpecialChars($user->getLastname()); ?></td>
                </tr>
                <tr>
                    <td>Dob</td>
                    <td><?= htmlSpecialChars($user->getDob()); ?></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td><?= htmlSpecialChars($user->getCity()); ?></td>
                </tr>
                <tr>
                    <td>Zipcode</td>
                    <td><?= htmlSpecialChars($user->getZipcode()); ?></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><?= htmlSpecialChars($user->getAddress()); ?></td>
                </tr>
                <tr>
                    <td>CreatedAt</td>
                    <td><?= htmlSpecialChars($user->getCreatedAt()->format('Y-m-d H:i:s')); ?></td>
                </tr>
                <tr>
                    <td>CountryId</td>
                    <td><?= htmlSpecialChars($user->getCountry()->getId()); ?></td>
                </tr>
                <tr>
                    <td>CountryName</td>
                    <td><?= htmlSpecialChars($user->getCountry()->getName()); ?></td>
                </tr>
                <tr>
                    <td>CountryCode</td>
                    <td><?= htmlSpecialChars($user->getCountry()->getCode()); ?></td>
                </tr>
                <tr>
                    <td>StatusId</td>
                    <td><?= htmlSpecialChars($user->getStatus()->getId()); ?></td>
                </tr>
                <tr>
                    <td>StatusName</td>
                    <td><?= htmlSpecialChars($user->getStatus()->getName()); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div style="position: relative; float: right; width: 49%;">
        <?= $transactions; ?>
    </div>
</div>
