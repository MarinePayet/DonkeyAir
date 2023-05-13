<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="../assets/img/DONKEY_AIR.svg" type="image/x-icon">
    <title><?php echo $flight; ?></title>
</head>
<nav class="p-1 mb-2 bg-dark text-white">

        <div class="d-flex">
            <div class="p-2">       
            <a class="navbar-brand" href="../flight/list"><img src="../assets/img/DONKEY_AIR.svg" alt="Logo" width="80" height="80"></a></div>
            <div class="align-self-center">DonkeyAir</div>
            <div class="p-2 flex-grow-1">
            <p class="fw-bold"></p>
            </div>

            <?php 
    if(!session_id()){
        session_start();
    }
    if(empty($_SESSION['name'])){
        ?><div class="align-self-center">
                <div class="p-2"><a class="btn btn-danger btn-lg" href="../user/login" role="button">Login</a></div>
            </div> <?php
    } else {


        ?>
        <div class="align-self-center">
            <div class="p-2">
                <?php echo "Coucou " . $_SESSION['name'];?>
                <a class="btn btn-secondary btn-lg" href="history.php" role="button">Historique</a>
                <a class="btn btn-secondary btn-lg" href="logout.php" role="button">Log out</a>
            </div>
        </div>
    <?php } ?>


            

        </div>
    </nav>
<body>

    <h1><?php echo $flight; ?></h1>
    




