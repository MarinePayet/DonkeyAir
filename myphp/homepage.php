<?php

require_once 'header.php';
require_once 'footer.php';
require_once 'db.php';
require_once 'config.php'; ?>

<body style="background-image: url('pexels-nicole-avagliano-2236713.jpg');background-repeat: no-repeat;background-size: cover;">




<div id="content">
    <!-- tester si l'utilisateur est connecté -->
    <!-- <?php
            // session_start();
            // if($_SESSION['email'] !== ""){
            //     $user = $_SESSION['email'];

            //     foreach ($pdo->query('SELECT * FROM users WHERE email= "' . $user . '"', PDO::FETCH_ASSOC) as $user){
            //         echo "Bonjour " . $user['name'] . ", vous êtes connecté";
            //     }; 
            // }

            ?> -->

</div>

<div class="container text-center">
    <div class="row align-items-start">

        <div class="col">

            <h1 class="titre"> DonkeyAir,la compagnie qui vous fait prendre de la hauteur.......à dos d’ane✈</h1>
        </div>

    </div>
</div>
<br>

<div class="container-lg">


    <form action="search.php" method="GET">
        <label for="depart">Départ:</label>
        <input type="text" id="depart" name="depart" required><br>
        <label for="destination">Destination:</label>
        <input type="text" id="destination" name="destination" required><br>
        <label for="date">Date de départ:</label>
        <input type="date" id="date" name="date" required><br>
        <label for="date">Date de retour:</label>
        <input type="date" id="date" name="date" required><br>
        <label for="passagers">Passagers:</label>
        <select id="passagers" name="passagers">
            <option value="1a-0c">1 adulte, 0 enfant</option>
            <option value="1a-1c">1 adulte, 1 enfant</option>
            <option value="1a-2c">1 adulte, 2 enfants</option>
            <option value="2a-0c">2 adultes, 0 enfant</option>
            <option value="2a-1c">2 adultes, 2 enfant</option>
            <option value="2a-2c">2 adultes, 3 enfants</option>
        </select>
        <input type="submit" value="Envoyer">

    </form>

</div>












</div>