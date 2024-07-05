<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leap years</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td, th {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Leap Years</h1>
    <?php
        function getLeapYears($currentYear) {
            $leapYears = array();
            for ($year = 0; $year <= $currentYear; $year++) {
                if (($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0)) {
                    $leapYears[] = $year;
                }
            }
            return $leapYears;
        }
    
        $currentYear = date("Y");
        $leapYears = getLeapYears($currentYear);
        $columns = 20;
        $totalLeapYears = count($leapYears);
        $rows = ceil($totalLeapYears / $columns);
    
        echo '<table>';
        for ($i = 0; $i < $rows; $i++) {
            echo '<tr>';
            for ($j = 0; $j < $columns; $j++) {
                $index = $i * $columns + $j;
                if ($index < $totalLeapYears) {
                    echo '<td>' . $leapYears[$index] . '</td>';
                } else {
                    echo '<td></td>';
                }
            }
            echo '</tr>';
        }
        echo '</table>';
    ?>
</body>
</html>