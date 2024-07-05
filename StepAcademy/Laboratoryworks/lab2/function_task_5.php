<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sub String Counter</title>
    <style>
        .red {
            color: red;
        }
    </style>
</head>
<body>
    <form method="post" action="">
        <label for="content">Enter content:</label><br>
        <textarea name="content" rows="10" cols="50" required></textarea><br><br>
        <label for="word">Enter word to search for:</label>
        <input type="text" name="word" required><br><br>
        <input type="submit" value="Count Repetitions">
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $content = $_POST['content'];
            $word = $_POST['word'];

            function countRepetitions($content, $word) {
                $words = explode(" ", $content);
                $repetitions = 0;
                $res = '';
                for($i = 0; $i < count($words); $i++){
                    if ($words[$i] == $word){
                        $res .= '<span class="red"> ' . $words[$i] . '</span>';
                        $repetitions++;
                    }
                    else {
                        $res .= ' ' . $words[$i];
                    }
                }
                return array(
                    'repetitions' => $repetitions,
                    'content' => $res,
                );
            }

            $result = countRepetitions($content, $word);
            $repetitions = $result['repetitions'];
            $content = $result['content'];
            if ($repetitions > 0) {
                echo '<p>Content:<br>' . $content . '<br><br>The string "' . $word . '" appears ' . $repetitions . ' times in the content.</p>';
            }
            else {
                echo 'Content:<br>' . $content . '<br><br>There is no ' . $word . ' in your text';
            }
            
            // prevent form clearing
            foreach($_POST as $key => $value){
                if(isset($display[$key])){
                    $display[$key] = htmlspecialchars($value);
                }
            }
        }
    ?>
</body>
</html>