<?php include 'types.php' ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pokémon Types</title>
</head>
<body>
    <h1>Select a Type:</h1>

    <form method="get">
        <?php foreach ($types as $key => $type): ?>
        <button type="submit" name="type" value="<?= $key ?>"><?= $type['type'] ?></button>
        <?php endforeach ?>
    </form>

    <br>

    <?php if ($selectedIndex > 0 && $selectedIndex <= count($types)): ?>
    <h1>Effective</h1>
    <ul>
        <?php foreach ($types[$selectedIndex]['effective'] as $k => $t): ?>
        <li><?= $types[$t]['type'] ?></li>
        <?php endforeach ?>
    </ul>

    <h1>Not Effective</h1>
    <ul>
        <?php foreach ($types[$selectedIndex]['not-effective'] as $k => $t): ?>
        <li><?= $types[$t]['type'] ?></li>
        <?php endforeach ?>
    </ul>
    
    <?php if (! empty($types[$selectedIndex]['cannot-hit'])): ?>
    <h1>Can't Hit</h1>
    <ul>
        <?php foreach ($types[$selectedIndex]['cannot-hit'] as $k => $t): ?>
        <li><?= $types[$t]['type'] ?></li>
        <?php endforeach ?>
    </ul>
    <?php endif ?>

    <?php $weaknesses = getEffectiveTypes($selectedIndex) ?>
    <h1>Weaknesses</h1>
    <ul>
        <?php foreach ($weaknesses as $k => $w): ?>
        <li><?= $w['type'] ?></li>
        <?php endforeach ?>
    </ul>
    <?php endif ?>
</body>
</html>