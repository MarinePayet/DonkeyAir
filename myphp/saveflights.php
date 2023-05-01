<?php

require_once 'header.php';
require_once 'footer.php';
require_once 'Database.php';

if (isset($_POST['go_id'])) {
    $_SESSION['go_id'] = (int)$_POST['go_id'];
}

if (isset($_POST['return_id'])) {
    $_SESSION['return_id'] = (int)$_POST['return_id'];
}







if (isset($_SESSION['go_id']) && isset($_SESSION['return_id'])) {

    $go_id = $_SESSION['go_id'];
    $return_id = $_SESSION['return_id'];
    
    $db = DataBase::getPdo();
    $statement = $db->prepare('SELECT price, flight_number FROM flights WHERE flight_id = :go_id');
    $statement->bindValue(':go_id', $go_id, PDO::PARAM_INT);
    $statement->execute();
    $go_flight = $statement->fetch(PDO::FETCH_ASSOC);
    $go_price = $go_flight['price'];

    $statement = $db->prepare('SELECT price, flight_number FROM flights WHERE flight_id = :return_id');
    $statement->bindValue(':return_id', $return_id, PDO::PARAM_INT);
    $statement->execute();
    $return_flight = $statement->fetch(PDO::FETCH_ASSOC);
    $return_price = $return_flight['price'];
    $total_price = $go_price + $return_price;

    return $total_price;


}
