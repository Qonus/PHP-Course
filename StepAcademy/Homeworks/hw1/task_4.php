<!DOCTYPE html>
<html>
<body>

<form method="post" action="">
  Type of Coffee: 
  <select name="coffee">
    <option value="latte">Latte</option>
    <option value="cappuccino">Cappuccino</option>
    <option value="espresso">Espresso</option>
  </select><br>
  Serving Size: 
  <select name="size">
    <option value="small">Small</option>
    <option value="medium">Medium</option>
    <option value="large">Large</option>
  </select><br>
  <input type="submit" value="Generate Recipe">
</form>

<?php
if (isset($_POST['coffee']) && isset($_POST['size'])) {
    $coffee = $_POST['coffee'];
    $size = $_POST['size'];
    $recipe = "";

    switch ($coffee) {
        case "latte":
            switch ($size) {
                case "small":
                    $recipe = "Small Latte Recipe: 1 shot espresso, 150ml steamed milk.";
                    break;
                case "medium":
                    $recipe = "Medium Latte Recipe: 2 shots espresso, 250ml steamed milk.";
                    break;
                case "large":
                    $recipe = "Large Latte Recipe: 3 shots espresso, 350ml steamed milk.";
                    break;
            }
            break;
        case "cappuccino":
            switch ($size) {
                case "small":
                    $recipe = "Small Cappuccino Recipe: 1 shot espresso, 100ml steamed milk, 100ml foam.";
                    break;
                case "medium":
                    $recipe = "Medium Cappuccino Recipe: 2 shots espresso, 200ml steamed milk, 200ml foam.";
                    break;
                case "large":
                    $recipe = "Large Cappuccino Recipe: 3 shots espresso, 300ml steamed milk, 300ml foam.";
                    break;
            }
            break;
        case "espresso":
            switch ($size) {
                case "small":
                    $recipe = "Small Espresso Recipe: 1 shot espresso.";
                    break;
                case "medium":
                    $recipe = "Medium Espresso Recipe: 2 shots espresso.";
                    break;
                case "large":
                    $recipe = "Large Espresso Recipe: 3 shots espresso.";
                    break;
            }
            break;
    }

    echo $recipe;
}
?>

</body>
</html>
