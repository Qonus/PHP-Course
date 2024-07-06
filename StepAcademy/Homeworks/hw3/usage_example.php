<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fantasy World</title>
</head>
<body>
    <?php
        include "fantasy_world.php";

        $qonus = new Elf("Demon slayer Qonus", 27, 100, 50, 100);
        echo $qonus->ToString();

        echo "<hr>";

        $cerberus = new Monster("All mighty, diabolical Cerberus", 120, 500, 999);
        echo $cerberus->ToString();

        echo "<hr>";

        echo $cerberus->attack($qonus) . "<br><br>";
        echo $qonus->attack($cerberus) . "<br><br>";
        echo $qonus->castSpell($qonus, $cerberus) . "<br><br>";
        echo $cerberus->attack($qonus) . "<br><br>";
        echo $cerberus->attack($qonus) . "<br><br>";
        echo $qonus->teleport($qonus, "$cerberus->name's back") . "<br><br>";
        echo $qonus->attack($cerberus) . "<br><br>";
        echo "<br><br><b>YAY $qonus->name defeated $cerberus->name</b>";
    ?>
</body>
</html>