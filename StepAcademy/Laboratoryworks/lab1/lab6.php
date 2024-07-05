<?php

    $a = (int)$_GET["a"];
    $b = (int)$_GET["b"];
    $c = (int)$_GET["c"];

    $d = $b * $b - 4 * $c * $a;
    echo "Discriminant = ".$d;

    $x1 = (-$b + sqrt($d)) / (2 * $a);
    $x2 = (-$b - sqrt($d)) / (2 * $a);

    echo "\nX1 = ".$x1;
    echo "\nX2 = ".$x2;
?>