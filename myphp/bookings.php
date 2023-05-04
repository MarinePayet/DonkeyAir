<?php
require_once 'header.php';
require_once 'database.php';
require_once 'footer.php';
require_once 'Booking.php';
require_once 'Flight.php';


Booking::newBooking();

header('Location: historic.php');