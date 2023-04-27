<?php

require_once 'header.php';
require_once 'footer.php';
require_once 'Database.php';
require_once 'verification.php';
require_once 'Airport.php';
?>


<body style="background-image: url('myphp/assets/img/pexels-nicole-avagliano-2236713.jpg');background-repeat: no-repeat;background-size: cover;">



    <div id="content">
        <!-- tester si l'utilisateur est connecté -->
        <!-- <?php

                // session_start();
                $_SESSION['email'] = $_POST['email'];

                // var_dump($_SESSION['email']);

                // if($_SESSION['email'] !== ""){
                $user = $_SESSION['email'];

                // foreach (Database::getPdo()->query('SELECT * FROM users WHERE email= "' . $user . '"', PDO::FETCH_ASSOC) as $user){
                //     echo "Bonjour " . $user['name'] . ", vous êtes connecté";
                //     }; 
                // }


                ?> -->



    </div>

    <div class="container text-center">
        <div class="row align-items-start">

            <div class="col">

                <h1 class="titre">DonkeyAir</h1>

                <p class="slogan">la compagnie qui vous fait prendre de la hauteur.......à dos d’ane✈</p>

            </div>

        </div>
    </div>
    <br>



    <div class="container-lg">


        <form action="homepage.php" method="POST">
            <label for="depart">Départ:</label>
            <select id="depart" name="departs">
                <?php Airport::listAirport() ?>;

            </select>
            <label for="destination">Destination:</label>
            <select id="depart" name="destination">
                <?php Airport::listAirport() ?>;
            </select>
            <label for="date">Date de départ:</label>
            <input type="date" id="date" name="date_depart" required><br>
            <label for="date">Date de retour:</label>
            <input type="date" id="date" name="date_retour" required><br>
            <label for="passagers">Passagers:</label>
            <select id="passagers" name="passagers">
                <option value="1a-0c" name="1">1 adulte, 0 enfant</option>
                <option value="1a-1c" name="2">1 adulte, 1 enfant</option>
                <option value="1a-2c" name="3">1 adulte, 2 enfants</option>
                <option value="2a-0c" name="2">2 adultes, 0 enfant</option>
                <option value="2a-1c" name="4">2 adultes, 2 enfant</option>
                <option value="2a-2c" name="5">2 adultes, 3 enfants</option>
            </select>
            <input type="submit" value="Envoyer">

        </form>
    </div>

    <?php
    if (isset($_POST['departs'])); {
        $depart = $_POST['departs'];
        $destination = $_POST['destination'];
        $date_depart = $_POST['date_depart'];
        $date_retour = $_POST['date_retour'];
        $passagers = $_POST['passagers'];
    }
    var_dump($depart);
    var_dump($destination);
    var_dump($date_depart);
    var_dump($date_retour);
    var_dump($passagers);

?>