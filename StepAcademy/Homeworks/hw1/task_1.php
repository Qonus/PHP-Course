<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post" action="">
  Amount in USD: <input type="number" name="amount"><br>
  Currency: 
  <select name="currency">
    <option value="EUR">EUR</option>
    <option value="GBP">GBP</option>
    <option value="KZT">KZT</option>
    <option value="UAH">UAH</option>
  </select><br>
  <input type="submit" value="Convert">
</form>
</body>
</html>


<?php
if (isset($_POST['amount']) && isset($_POST['currency'])) {
    $amount = $_POST['amount'];
    $currency = $_POST['currency'];
    $convertedAmount = 0;

    switch ($currency) {
        case "EUR":
            $convertedAmount = $amount * 0.85;
            break;
        case "GBP":
            $convertedAmount = $amount * 0.75;
            break;
        case "KZT":
            $convertedAmount = $amount * 425;
            break;
        case "UAH":
            $convertedAmount = $amount * 27;
            break;
    }

    echo "Amount in $currency: $convertedAmount";
}
?>
