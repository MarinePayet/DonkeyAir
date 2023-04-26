<?php
require_once 'header.php';
require_once 'footer.php';
?>


<h1>PASSAGERS</h1>

<div class="container">
     <div class="form-box">
          <form>
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
                    <label for="nom">Nom :</label>
                    <input type="text" id="nom" name="nom" required>
               </div>

               <div class="form-pax">
                    <label for="prenom">Prénom :</label>
                    <input type="text" id="prenom" name="prenom" required>
               </div>

               <div class="form-pax">
                    <label for="email">E-mail :</label>
                    <input type="email" id="email" name="email" required>
               </div>

               <div class="form-pax">
                    <label for="tel">Téléphone :</label>
                    <input type="tel" id="tel" name="tel" required>
               </div>

               <div class="form-pax">
                    <label for="dateNaissance">Date de naissance :</label>
                    <input type="date" id="dateNaissance" name="dateNaissance" required>
               </div>

               <div class="form-pax">
                    <label for="passport">Numéro de passeport :</label>
                    <input type="text" id="passport" name="passport" required>
               </div>

               <input type="submit" value="Enregistrer">

          </form>
     </div>
</div>



