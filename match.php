<?php
include_once("./inc/pdo.php");
$email = $_GET['email'];
$rq2 = "SELECT * FROM `user` WHERE email = '$email'";
$read = $pdo->prepare($rq2);
$read->execute();
$result = $read->fetch();
$titres = [
    $result['titre1'],
    $result['titre2'],
    $result['titre3'],
    $result['titre4'],
    $result['titre5']
];
$sexe = $result['sexe'];
 $resultGlobal = [];
foreach ($titres as $key => $value) {
    $rq3 = "SELECT * FROM `user` WHERE email != '$email'
    AND titre1 = '$value' OR titre2 = '$value' 
     OR titre3 = '$value' OR titre4 = '$value'
     OR titre5 = '$value'";
    $readTitres = $pdo->prepare($rq3);
    $readTitres->execute();
    $resultTitres = $readTitres->fetchAll();
   
    foreach ($resultGlobal as $key => $value) {
       if($result['id_user'] !== $value['id_user']) {
        array_push($resultGlobal,$value);
       }
    }
}
$resultGlobal = array_unique($resultGlobal,SORT_REGULAR); 
var_dump($resultTitres);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include("./inc/menu.php");?>
    <h1>Page de match</h1>
<div><?= $result['titre1'] ?></div>
    <div><?= $result['titre2'] ?></div>
    <div><?= $result['titre3'] ?></div>
    <div><?= $result['titre4'] ?></div>
    <div><?= $result['titre5'] ?></div>
</body>

</html>