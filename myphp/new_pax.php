<?php
require_once 'header.php';
require_once 'footer.php';
require_once 'Database.php';
require_once 'Passenger.php';

?>


<h2>PASSAGERS</h2>

<div class="container">
     <div class="form-box">
          <form action= "#" method= "post">
               <div class="form-pax">
                    <label for="sexe">Sexe :</label>
                    <div class="radio-pax">
                         <input type="radio" id="homme" name="sexe" value="homme" required>
                         <label for="homme">Homme</label>
                         <input type="radio" id="femme" name="sexe" value="femme" required>
                         <label for="femme">Femme</label>
                    </div>
               </div>

               <div class="form-pax">
                    <label for="name">Nom Prénom :</label>
                    <input type="text" id="name" name="name">
               </div>

               <div class="form-pax">
                    <label for="email">E-mail :</label>
                    <input type="email" id="email" name="email">
               </div>

               <div class="form-pax">
                    <label for="phone">Téléphone :</label>
                    <input type="tel" id="phone" name="phone">
               </div>

               <div class="form-pax">
                    <label for="dateNaissance">Date de naissance :</label>
                    <input type="date" id="dateNaissance" name="dateNaissance">
               </div>

               <div class="form-pax">
                    <label for="passport_number">Numéro de passeport :</label>
                    <input type="text" id="passport_number" name="passport_number">
               </div>

               <input type="submit" value="Enregistrer">

          </form>
     </div>
</div>

<?php

Passenger::createPassenger();









// Création d'une instance de la classe Passenger
// $passenger = new Passenger($pdo);

// var_dump($passenger);

// Insertion des données des passagers dans la base de données
// foreach ($passenger as $key => $value) {
//     $passenger->createPassenger($names[$key], $emails[$key], $phones[$key], $passport_numbers[$key]);
// }

// Redirection vers la page de récapitulatif
// header('Location: recapitulatif.php');
// exit();



