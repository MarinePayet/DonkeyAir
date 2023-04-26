<?php
     require_once 'header.php';
?>   

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>PASSAGERS</title>
     <link href="style.css" rel="stylesheet">
</head>
<body>
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

                    <!-- <label for="sexe">Sexe :</label>
                    <input type="radio" id="homme" name="sexe" value="homme" required>
                    <label for="homme">Homme</label>
                    <input type="radio" id="femme" name="sexe" value="femme" required>
                    <label for="femme">Femme</label>

                    <label for="nom">Nom :</label>
                    <input type="text" id="nom" name="nom" required>
                    
                    <label for="prenom">Prénom :</label>
                    <input type="text" id="prenom" name="prenom" required>

                    <label for="email">E-mail :</label>
                    <input type="email" id="email" name="email" required>

                    <label for="tel">Téléphone :</label>
                    <input type="tel" id="tel" name="tel" required>

                    <label for="dateNaissance">Date de naissance :</label>
                    <input type="date" id="dateNaissance" name="dateNaissance" required>

                    <label for="passport">Numéro de passeport :</label>
                    <input type="text" id="passport" name="passport" required>

                    <input type="submit" value="Enregistrer"> -->
               </form>
     
</body>
</html>
