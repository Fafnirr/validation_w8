<?php

spl_autoload_register(function ($class) {
    require 'classes/' . $class . '.php';
});

$player1 = new Warrior('Cloud');
$player2 = new Magician('Vivi');
$player3 = new Archer('Hawk');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baston</title>
</head>
<body>
    <?php while ($player1->isAlive() && $player3->isAlive()): ?>
        <div>
            <p><?= $player1->turn($player3) ?></p>
            <?php $result = "$player1->name a gagné !" ?>
            <?php if ($player3->isAlive()): ?>
                <p><?= $player3->turn($player1) ?></p>
                <?php $result = "$player3->name a gagné !" ?>
            <?php endif ?>
        </div>
    <?php endwhile ?>
    <p><?= $result ?></p>
    
</body>
</html>
