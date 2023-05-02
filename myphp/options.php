<?php 
require_once 'header.php';
?>

<div class="optionbox">
		<p class="text-uppercase fw-bold fs-4">Mes Options de voyage</p>
		<form method="POST" action="recapitulatif.php">
			<label for="vip-access">VIP Acces :</label>
			<p>Accès au salon - Accès prioritaire aux controles</p>
			<div class="form-check">
                <input type="checkbox" class="form-check-input" id="vip_access" value="vip_access 50 €" name="vip_access">
                <label class="form-check-label" for="vip_access"  name="vip_access">50 €</label>
            </div>
			<br>
            
			<label for="seat-exit">Sièg Premium : </label>
			<p>Espace prévilégié - Confortable et ajustable - Ecran vidéo </p>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="seats" id="exit_seat" value="exit_seat 50 €" >
                <label class="form-check-label" for="exampleRadios1">
                    Sortie de Secours : 50 €
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="seats" id="premium_seat" value="premium_seat  150 €">
                <label class="form-check-label" for="exampleRadios2">
                    Premium: 150 €
                </label>
                </div>
			
			<br>
            
			<label for="luggage">Bagages :</label>
			<p>Franchise bagage adaptée à vos besoins</p>
			<select id="luggage" name="luggage">
				<option value="0">Nombre de bagage à ajouter</option>
				<option value="1 bagage de 23kg 70 €" name>1 bagage de 23kg -> 70 €</option>
				<option value="2 eme bagages 23kg 160 €">2 bagages 23kg -> 160 €</option>
				<option value="3 eme bagages de 23kg 250 €">3 bagages de 23kg -> 250 €</option>
				<!-- <input type="submit" value="Ajouter"> -->
			</select>
			<br>
            
			<label for="pmr-assistance">Assistance :</label>
			<p>A vos côtés pour vous assister </p>
			<select id="pmr-assistance" name="pmr-assistance">
                <option value="0">Choisir</option>
				<option value="Chaise roulante">Chaise roulante</option>
				<option value="Mal voyant">Mal voyant</option>
				<option value="Mal entendant">Mal entendant</option>
				<option value="umnr 50€">Mineur non accompagné -> 50 €</option>
				<!-- <input type="submit" value="Ajouter"> -->
			</select>
			<br>
            
			<label for="meal">Repas:</label>
			<p>Choisissez le repas qui vous convient</p>
			<select id="meal" name="meal">
                <option value="0"></option>
				<option value="Végétarien 20 €">Végétarien -> 20 €</option>
				<option value="Halal 20 €">Halal -> 20 €</option>
				<option value="Casher 20 €">Casher -> 20 €</option>
				<input type="submit" value="Ajouter">
                
			</select>
			<br>
		</form>
        <?php var_dump($_POST) ?>
	</div>
