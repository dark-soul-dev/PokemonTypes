<?php include 'scripts/types.php' ?>
<?php
if (empty($selectedIndex) || $selectedIndex > count($types)) {
    header('Location: index.php');
    exit();
}
$tables = array();
$tables['Super Efetivo'] = getEffectiveTypes($selectedIndex);
$tables['Pouco Efetivo'] = getNotEffectiveTypes($selectedIndex);
$tables['Não Afeta'] = getCantHitTypes($selectedIndex);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pokémon Types</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="index.php">Voltar à Página Inicial</a>

    <h2>Tipo:</h2>

    <p class="type" style="color: <?= $relations[getKey($types[$selectedIndex])]['color'] ?>"><?= $types[$selectedIndex] ?></p>

    <br>

    <?php foreach ($tables as $key => $table): ?>
    <?php if (empty($table)) continue ?>
    <table style="float: left;">
        <thead>
            <tr>
                <th><?= $key ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($table as $key => $value): ?>
            <tr>
                <td style="color: <?= $relations[getKey($value)]['color'] ?>"><?= $value ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <?php endforeach ?>
</body>
</html>