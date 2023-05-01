<?php
require_once 'header.php';
require_once 'footer.php';
require_once 'Database.php';





if (isset($_POST['selectionnevolaller'])) {
    $flight_id = $_POST['flight_id'];
    $db = DataBase::getPdo();
    $statement = $db->prepare('SELECT price, flight_number FROM flights WHERE flight_id = :flight_id');
    $statement->bindValue(':flight_id', $flight_id, PDO::PARAM_INT);
    $statement->execute();
    $flight = $statement->fetch(PDO::FETCH_ASSOC);
    $price = $flight['price'];

    echo "<h1>Vous avez sélectionné le vol aller n°".$flight['flight_number']."</h1>";
    echo "<h2>Le prix du vol aller est de ".$price."€</h2>";
}