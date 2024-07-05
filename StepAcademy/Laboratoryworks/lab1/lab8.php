<?php
    $a = (int)$_GET["a"];
    $b = (int)$_GET["b"];
    $text = ($a > $b) ? "max: ".$a : "max: ".$b;
    echo $text;
?>