<?php

$apikey="4a3daa6c49dcaffc6c9e260bd3a4cfd9";
if(isset($_POST["miasto"])){
$city=$_POST["miasto"];   
}
else $city="Warszawa";

$url="https://api.openweathermap.org/data/2.5/weather?q=".$city."&appid=".$apikey."&units=metric&lang=pl";

$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);
$data = json_decode($response);


?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
    <style>
        *{
            margin: 20px;
        }
    </style>
    <form method="post">
        <label>Podaj miasto:</label>
        <input type="text" name="miasto">
        <input type="submit" value="Wyszukaj" name="search">
    </form>
    <h4>
    <?php
        if(isset($_POST["miasto"])){
            echo $data->name;
            echo " ";
            echo $data->main->temp; 
            echo "°C"; 
        }
    ?>
    </h4>
</body>
</html>