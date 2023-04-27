<?php

require_once 'header.php';
require_once 'footer.php';
require_once 'Database.php';
require_once 'verification.php';
require_once 'Airport.php';
?>

<body style="background-image: url('../myphp/assets/img/pexels-nicole-avagliano-2236713.jpg');background-repeat: no-repeat;background-size: cover;">





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



        <form action="flightlist.php" method="POST">

            <label for="depart">Départ:</label>
            <select id="depart" name="depart">
                <?php Airport::listAirport() ?>;

            </select>
            <label for="destination">Destination:</label>
            <?php $db = Database::getPdo();
            $airports = $db->query('SELECT * FROM airports ');

            ?>
            <select id="destination" name="airport_id" >
            <?php foreach ($airports as $airport): 

            
            ?>
                <option name="airport_id" value="<?php echo $airport['airport_id'] ?>"> <?php echo $airport['airport_id'] ?> </option>  
                <?php ; ?>

          
            <?php endforeach; 
            ?>
            </select>

            <label for="date">Date de départ:</label>
            <input type="date" id="date" name="date_depart" ><br>
            <label for="date">Date de retour:</label>
            <input type="date" id="date" name="date_retour" ><br>

            <label for="passagers">Passagers:</label>
            <select id="passagers" name="passagers">
                <option value="1" name="1">1 adulte, 0 enfant</option>
                <option value="2" name="2">1 adulte, 1 enfant</option>
                <option value="3" name="3">1 adulte, 2 enfants</option>
                <option value="2" name="2">2 adultes, 0 enfant</option>
                <option value="4" name="4">2 adultes, 2 enfant</option>
                <option value="5" name="5">2 adultes, 3 enfants</option>
            </select>
            <!-- <input type="hidden" value="<?=$airport['id']?>" name="airport_id"> -->
            <input type="submit" value="Envoyer">

        </form>
    </div>


