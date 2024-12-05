<?= debug(get_class($this)); ?>
<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>Username</th>
			<th>City</th>
			<th>Status</th>
			<th>Country</th>
		</tr>
	</thead>
	<tbody>
        <?php foreach ($userList as $user): ?>
			<tr>
				<td><?= htmlSpecialChars($user->getId()); ?></td>
				<td>
					<a href="<?= $url . '/' . htmlSpecialChars($user->getId()) ?>">
                        <?= htmlSpecialChars($user->getUsername()) ?>
                    </a>
				</td>
				<td><?= htmlSpecialChars($user->getCity()); ?></td>
				<td><?= htmlSpecialChars($user->getStatusName()); ?></td>
				<td><?= htmlSpecialChars($user->getCountryName()); ?></td>
			</tr>
        <?php endforeach; ?>
	</tbody>
</table>
