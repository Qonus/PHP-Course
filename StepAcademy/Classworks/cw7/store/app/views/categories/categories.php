<?php 

function generate_tree_of_categories($categories, int $parent) {
    echo "<ul class='categories'>";
    foreach ($categories as $category) {
        $category = (array)$category;
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
    generate_tree_of_categories($categories, $parent);
}
else {
    echo "<p>No Categories.</p>";
}

?>