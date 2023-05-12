<?php
require_once 'config/constant.php';
require_once 'config/db.php';
require_once 'config/repositories.php';
require_once 'config/model.php';



$uri = $_SERVER['REQUEST_URI'];


$explodeUri = explode('/', $uri);

$controller = $explodeUri[1] ? $explodeUri[1] : 'index';


$controller .= 'Controller';

include './Controller/' . $controller . '.php';

$action = $explodeUri[2] ?? 'list';

$id = $explodeUri[3] ?? null;

$instance = new $controller($dbh);
$instance->$action();


