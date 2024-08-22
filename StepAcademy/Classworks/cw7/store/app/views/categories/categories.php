<?php 

function generate_tree_of_categories($categories, int $parent) {
    echo "<ul class='categories'>";
    foreach ($categories as $category) {
        $category = (array)$category;
        if($category["parent_category_id"] == $parent || ($category["parent_category_id"] == null && $parent == -1)) {
            echo "<li class='card'><a style='color: black;' href='/categories/{$category['category_name']}/'>";
            echo $category["category_name"];
            generate_tree_of_categories($categories, $category["category_id"]);
            echo "</a></li>";
        }
    }
    echo "</ul>";
}

$parent = -1;
generate_tree_of_categories($categories, $parent);

?>