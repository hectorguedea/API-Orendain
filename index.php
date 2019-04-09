<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>API - Autotrasporte Orendain</title>
</head>
<body>
<?php 
require_once('api.class.php');

$Api = new API();
$Position = $Api->getPositionByClientName();
$CurrentPosition = $Api->GetCurrentPositionByClientName();

echo '<strong>Son '. $Position->count().' posiciones registradas: </strong><br/>'; 

for ($i = 0; $i < $Position->count(); $i++) {
    echo $Position[$i]->Address .'<br>';
}

echo '<pre>';
//print_r($CurrentPosition);
echo '</pre>';


?>

    
</body>
</html>