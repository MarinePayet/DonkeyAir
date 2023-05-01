<?php

require_once 'header.php';
require_once 'footer.php';
require_once 'Database.php';

if(isset($_POST['go_id']) && isset($_POST['return_id'])){
    header("location: recapitulatif.php");
} elseif (isset($_POST['go_id'])){
    $_SESSION['go_id'] = (int)$_POST['go_id'];

    var_dump($_SESSION['go_id']);
    // header("location: flightlist.php");

} elseif(isset($_POST['return_id'])){
    $_SESSION['return_id'] = (int)$_POST['return_id'];

}




