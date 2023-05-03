<?php
require_once 'header.php';
require_once "Booking.php";
require_once 'Database.php';
require_once 'Flight.php';

echo  $_SESSION['user_id'] . " " . $_SESSION['go_id'] . " " . $_SESSION['return_id'] . " " . $_SESSION['go_date'];


Booking::newBooking();
Flight::selectGoFlight($_SESSION['go_id']);
Flight::updateGoFlight($_SESSION['go_id']);