<?php
require_once 'header.php';
require_once 'footer.php';
require_once 'Database.php';
require_once 'Passenger.php';
var_dump($_POST);

?>

<h2>PASSAGERS</h2>

<form method="post" action="recapitulatif.php">
     <?php
     $nb_pax = $_SESSION['nb_pax'];
     for ($i = 0; $i < $nb_pax; $i++) {
     ?>
          <div class="container">
               <div class="form-box">
                    <div class="form-pax">
                         <label for="sexe">Sexe :</label>
                         <div class="radio-pax">
                              <input type="radio" id="homme" name="sexe[<?php echo $i; ?>]" value="homme" required>
                              <label for="homme">Homme</label>
                              <input type="radio" id="femme" name="sexe[<?php echo $i; ?>]" value="femme" required>
                              <label for="femme">Femme</label>
                         </div>
                    </div>

                    <div class="form-pax">
                         <label for="name">Nom Prénom :</label>
                         <input type="text" id="name" name="name[<?php echo $i; ?>]">
                    </div>

                    <div class="form-pax">
                         <label for="email">E-mail :</label>
                         <input type="email" id="email" name="email[<?php echo $i; ?>]">
                    </div>

                    <div class="form-pax">
                         <label for="phone">Téléphone :</label>
                         <input type="tel" id="phone" name="phone[<?php echo $i; ?>]">
                    </div>

                    <div class="form-pax">
                         <label for="birthdate">Date de naissance :</label>
                         <input type="date" id="birthdate" name="birthdate[<?php echo $i; ?>]">
                    </div>

                    <div class="form-pax">
                         <label for="passport_number">Numéro de passeport :</label>
                         <input type="text" id="passport_number" name="passport_number[<?php echo $i; ?>]">
                    </div>
               </div>
          </div>
     <?php
     }
     ?>
     <input type="submit" value="Enregistrer">
</form>