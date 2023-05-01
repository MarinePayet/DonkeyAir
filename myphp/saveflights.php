<?php

require_once 'header.php';
require_once 'footer.php';
require_once 'Database.php';

if(isset($_GET['go_id'])){
    $_SESSION['go_id'] = (int)$_GET['go_id'];
}

if(isset($_GET['return_id'])){
    $_SESSION['return_id'] = (int)$_GET['return_id'];
}


