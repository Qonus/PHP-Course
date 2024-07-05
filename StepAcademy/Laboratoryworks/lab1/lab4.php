<?php
    $a = (int)$_GET["a"];
    $b = (int)$_GET["b"];
    $c = (int)$_GET["c"];
    $text = ($a < $b + $c && $b < $a + $c && $c < $a + $b) ? "Your triangle exists" : "Your triangle isn't possible you silly";
    echo $text;
    # http://localhost/Aibat/lab4.php/?a=5&b=3&c=10
?>