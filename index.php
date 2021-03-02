<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="index.css">
    <title>Exo complet lecture SQL.</title>
</head>
<body>

<?php
require "./Classes/DB.php";

$db = DB::getInstance();

$search = $db->prepare("SELECT * FROM clients");

$state = $search->execute();

if($state) {
    $result = $search->fetchAll();
    echo "<span>Liste des différents clients:</span>";
    foreach ($result as $user) {
        echo "<p> Le client $user[id] s'appelle $user[firstName] $user[lastName]et est née le $user[birthDate]</p>";
    }
}

$search = $db->prepare("SELECT * FROM showtypes");

$state = $search->execute();

if($state) {
    $result = $search->fetchAll();
    echo "<span>Liste des différents shows:</span>";
    foreach ($result as $user) {
        echo "<p>$user[type]</p>";
    }
}

$search = $db->prepare("SELECT * FROM clients LIMIT 20");

$state = $search->execute();

if($state) {
    $result = $search->fetchAll();
    echo "<span>Liste des 20 premiers clients:</span>";
    foreach ($result as $user) {
        echo "<p> Le client $user[id] s'appelle $user[firstName] $user[lastName]et est née le $user[birthDate]</p>";
    }
}

$search = $db->prepare("SELECT * FROM clients WHERE card = '1'");

$state = $search->execute();

if($state) {
    $result = $search->fetchAll();
    echo "<span>Liste des clients possédants une carte:</span>";
    foreach ($result as $user) {
        echo "<p> Le client $user[id]: $user[firstName] $user[lastName]</p>";
    }
}

$search = $db->prepare("SELECT * FROM clients WHERE lastName LIKE 'M%' ORDER BY lastName ASC ");

$state = $search->execute();

if($state) {
    $result = $search->fetchAll();
    echo "<span>Liste des clients avec le nom commencant par un 'M':</span>";
    foreach ($result as $user) {
        echo "<p>$user[lastName] <br> $user[firstName]<br><br></p>";
    }
}

$search = $db->prepare("SELECT * FROM shows ORDER BY title ASC");

$state = $search->execute();

if($state) {
    $result = $search->fetchAll();
    echo "<span>Liste des spectacles:</span>";
    foreach ($result as $user) {
        echo "<p>Le spectacle $user[title], fait par $user[performer] prévu le $user[date], commencera à $user[startTime] et durera $user[duration]</p>";
    }
}

$search = $db->prepare("SELECT * FROM clients");

$state = $search->execute();

if($state) {
    $result = $search->fetchAll();
    echo "<span>Liste des clients:</span>";
    foreach ($result as $user) {
        echo "<p>Nom: $user[lastName]</p>";
        echo "<p>Prenom: $user[firstName]</p>";
        echo "<p>Date de naissance: $user[birthDate]</p>";

        if($user['card'] === "1") {
            echo "<p>Carte de fidélité: Oui</p>";
            echo "<p>Numéro de carte: $user[cardNumber]</p><br>";
        }
        else {
            echo "<p>Carte de fidélité: Non</p><br>";
        }
    }
}
?>

</body>
</html>
