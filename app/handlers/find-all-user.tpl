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
				<td><?= htmlSpecialChars($user->getId()); ?></td>
				<td>
					<?php
						$link = '/transaction/' . htmlSpecialChars($user->getId());
						$title = htmlSpecialChars($user->getUsername());
						echo "<a href='{$link}'>$title</a>";
					?>
				</td>
				<td><?= htmlSpecialChars($user->getCity()); ?></td>
				<td><?= htmlSpecialChars($user->getStatusName()); ?></td>
				<td><?= htmlSpecialChars($user->getCountryName()); ?></td>
			</tr>
        <?php endforeach; ?>
	</tbody>
</table>
