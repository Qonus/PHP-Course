<?php foreach($products as $item) {
    $item = (array)$item;
    $product_link = "/product/{$item['product_id']}/";
    $product_name = $item['product_name'];
    $price = $item['price'];
    include "product-card.php";
}?>

