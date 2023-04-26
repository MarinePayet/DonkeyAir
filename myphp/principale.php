<?php

require_once 'db.php';
require_once 'config.php'; 
require_once 'header.php'; ?>


<div id="content">
<!-- tester si l'utilisateur est connecté -->
<?php
session_start();
if($_SESSION['email'] !== ""){
    $user = $_SESSION['email'];

    foreach ($pdo->query('SELECT * FROM users WHERE email= "' . $user . '"', PDO::FETCH_ASSOC) as $user){
        echo "Bonjour " . $user['name'] . ", vous êtes connecté";
    }; 
}

?>

</div>
