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
			<th>Username</th>
			<th>City</th>
			<th>Status</th>
			<th>Country</th>
		</tr>
	</thead>
	<tbody>
        <?php foreach ($users as $user): ?>
			<tr>
				<td><?= $user->getId(); ?></td>
				<td><a href="/transaction/<?= $user->getId(); ?>">
                        <?= $user->getUsername(); ?></a>
				</td>
				<td><?= $user->getCity(); ?></td>
				<td><?= $user->getStatusName(); ?></td>
				<td><?= $user->getCountryName(); ?></td>
			</tr>
        <?php endforeach; ?>
	</tbody>
</table>
