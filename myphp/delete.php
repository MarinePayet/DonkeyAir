<?php 
require_once 'Database.php';


if(!session_id()){
    session_start();
}
$booking = $_GET['id'];

$db = Database::getPdo();
$bookings = $db->query('DELETE FROM bookings WHERE `booking_id` =' . $booking . ';');

$bookings->execute();


header('Location: homepage.php');
