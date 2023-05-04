<?php

require_once 'database.php';
require_once 'footer.php';
require_once 'Booking.php';
require_once 'Flight.php';

if(!session_id()){
    session_start();
}

Booking::newBooking();

header('Location: historic.php');