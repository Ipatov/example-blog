Users:
<table>
	<tr>
		<td width="50">ID</td>
		<td width="150">Name</td>
	</tr>
<?php foreach($users as $oneUser): ?>
	<tr>
		<td><?=$oneUser['id'];?></td>
		<td><?=$oneUser['name'];?></td>
	</tr>
<?php endforeach; ?>
</table>