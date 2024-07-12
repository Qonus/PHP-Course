<?php
    require "database.php";

    $sql = "SELECT * FROM categories";
    $query = $pdo->query($sql);
    $categories = $query->fetchAll();

    function generate_tree_of_categories($categories, int $parent) {
        echo "<ul>";
        foreach ($categories as $category) {
            if($category["parent_category_id"] == $parent || ($category["parent_category_id"] == null && $parent == -1)) {
                echo "<li>";
                echo $category["category_name"];
                generate_tree_of_categories($categories, $category["category_id"]);
                echo "</li>";
            }
        }
        echo "</ul>";
    }

    if(count($categories) > 0) {
        $parent = -1;
        include "categories.php";
    }
    else {
        echo "<p>No Categories.</p>";
    }
?>