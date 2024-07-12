<?php
require "database.php";

$sql = "SELECT * FROM categories ORDER BY parent_category_id";
$query = $pdo->query($sql);
$categories = $query->fetchAll();

if(count($categories) > 0): ?>
    <ul>
        <?php foreach($categories as $row): ?>
            <li>
                <span><?=$row["category_name"]?></span>
                <ul>
                    <li>Subcategory</li>
                    <li>Subcategory</li>
                    <li>Subcategory</li>
                </ul>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No categories.</p>
<?php endif; ?>