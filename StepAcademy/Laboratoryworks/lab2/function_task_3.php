<?php
function generateForm($dataArray) {
    $formHtml = '<form action="" method="post">';
    
    foreach ($dataArray as $key => $value) {
        $formHtml .= '<label for="' . htmlspecialchars($key) . '">' . htmlspecialchars($key) . '</label>';
        $formHtml .= '<input type="text" name="' . htmlspecialchars($key) . '" value="' . htmlspecialchars($value) . '"><br>';
    }
    
    $formHtml .= '<input type="submit" value="Submit">';
    
    $formHtml .= '</form>';
    
    return $formHtml;
}

$dataArray = ['name' => 'John Doe', 'email' => 'john@example.com', 'age' => '30'];
echo generateForm($dataArray);
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo '<h2>Submitted Data</h2>';
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
}
?>
