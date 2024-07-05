<?php
    $num = (int)$_GET["num"];
    $text = ($num < 0) ? "YOUR NUMBER: ".($num * -1) : "YOUR NUMBER: ".$num;
    echo $text;
    # http://localhost/Aibat/lab9.php/?num=-44
?>