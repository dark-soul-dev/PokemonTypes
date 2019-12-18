<?php include 'types.php' ?>
<!DOCTYPE html>
<html>
<head>
	<title>Lista de Tipos</title>
</head>
<body bgcolor="#222">
	<center>
		<h1>
			<font face="sans-serif" color="lightgray">Tipos Pokémon</font>
		</h1>

		<table border="2">
			<th><font face="sans-serif" color="lightgray">Tipo</font></th>
			<th><font face="sans-serif" color="lightgray">Fraqueza</font></th>
			<th><font face="sans-serif" color="lightgray">Pouco Efetivo</font></th>
			<th><font face="sans-serif" color="lightgray">Super Efetivo</font></th>
			<th><font face="sans-serif" color="lightgray">Não afeta</font></th>

			<?php foreach ($types as $key => $type): ?>
			<tr>
				<td bgcolor="<?= $relations[$key]['color'] ?>"><font face="sans-serif" color="white"><?= $type ?></font></td>

				<td>
				<?php foreach (getWeaknessTypes($key) as $value): ?>
					<font face="sans-serif" color="<?= $relations[getKey($value)]['color'] ?>"><?= $value ?></font>
				<?php endforeach ?>
				</td>

				<td>
				<?php foreach (getNotEffectiveTypes($key) as $value): ?>
					<font face="sans-serif" color="<?= $relations[getKey($value)]['color'] ?>"><?= $value ?></font>
				<?php endforeach ?>
				</td>

				<td>
				<?php foreach (getEffectiveTypes($key) as $value): ?>
					<font face="sans-serif" color="<?= $relations[getKey($value)]['color'] ?>"><?= $value ?></font>
				<?php endforeach ?>
				</td>

				<td>
				<?php foreach (getCantHitTypes($key) as $value): ?>
					<font face="sans-serif" color="<?= $relations[getKey($value)]['color'] ?>"><?= $value ?></font>
				<?php endforeach ?>
				</td>
			</tr>
			<?php endforeach ?>
		</table>
	</center>
</body>
</html>