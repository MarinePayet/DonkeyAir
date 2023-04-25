<?php

require_once 'header.php';
require_once 'footer.php';
require_once 'Database.php';

session_start();

if(isset($_POST['email']) && isset($_POST['password'])) {

    $usermail = trim($_POST['email']);
    $password = trim($_POST['password']);

try {
    if($usermail !== "" && $password !== ""){ 

        $db = new PDO('mysql:host=localhost; dbname=donkeyair', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $query = "SELECT count(*) FROM users where email = '". $usermail."' and password = '".$password."' ";
        
        $statement = $db->prepare($query);
        $reponse = $statement->execute();
        $count = $statement->fetchColumn();
        

        if($count != 0){
            echo "ok existe dans la base";
        } else {
            echo "introuvable";
        }
    }


} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
    
}