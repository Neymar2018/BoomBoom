<?php
$email = $_GET['email'];
$rq2 = "SELECT * FROM `user` WHERE email = '$email'";
    $read = $pdo->prepare($rq2);
    $read->execute();
    $result = $read->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div><?php $result['titre1'] ?></div>
    <div><?php $result['titre2'] ?></div>
    <div><?php $result['titre3'] ?></div>
    <div><?php $result['titre4'] ?></div>
    <div><?php $result['titre5'] ?></div>
</body>
</html>