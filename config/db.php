<?php

try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASS);
} catch (PDOException $e) {
    echo $e->getMessage(); die;
}