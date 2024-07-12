<ul>
    <?php
    foreach ($categories as $category): ?>
        <?php if($category["parent_category_id"] == $parent || ($category["parent_category_id"] == null && $parent == -1)): ?>
            <li>
                <?=$category["category_name"];?>
                <?php
                    $parent = $category["category_id"];
                    include "categories.php";
                ?>
            </li>
        <?php endif; ?>
    <?php 
    endforeach;
    ?>
</ul>