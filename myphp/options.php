<?php 
require_once 'header.php';
?>

<div class="optionbox">
		<p class="text-uppercase fw-bold fs-4">Mes Options de voyage</p>
		<form method="POST" action="#">
			<label for="vip-access">VIP Acces :</label>
			<p>Accès au salon - Accès prioritaire aux controles</p>
			<div class="form-check">
                <input type="checkbox" class="form-check-input" id="vip_access" name="vip_access">
                <label class="form-check-label" for="vip_access" name="vip_access">50 €</label>
            </div>
			<br>
            
			<label for="seat-exit">Sièg Premium : </label>
			<p>Espace prévilégié - Confortable et ajustable - Ecran vidéo </p>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="seats" id="exit_seat" value="exit_seat" >
                <label class="form-check-label" for="exampleRadios1">
                    Sortie de Secours : 50 €
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="seats" id="premium_seat" value="premium_seat">
                <label class="form-check-label" for="exampleRadios2">
                    Premium: 150 €
                </label>
                </div>
            
            <!-- <div class="form-check">
                <input type="checkbox" class="form-check-input" id="seat-exit" name="seat_exit">
                <label class="form-check-label" for="exampleCheck1" > </label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="premium_seat" name="seat-premium_seat">
                <label class="form-check-label" for="premium_seat" >Premium - 150 €</label>
            </div> -->
            <!-- <input type="submit" value="Ajouter"> -->
			
			<br>
            
			<label for="luggage">Bagages :</label>
			<p>Franchise bagage adaptée à vos besoins</p>
			<select id="luggage" name="luggage">
				<option value="0">Nombre de bagage à ajouter</option>
				<option value="70" name>1 bagage de 23kg -> 70 €</option>
				<option value="160">2 bagages 23kg -> 160 €</option>
				<option value="250">3 bagages de 23kg -> 250 €</option>
				<!-- <input type="submit" value="Ajouter"> -->
			</select>
			<br>
            
			<label for="pmr-assistance">Assistance :</label>
			<p>A vos côtés pour vous assister </p>
			<select id="pmr-assistance" name="pmr-assistance">
                <option value="0">Choisir</option>
				<option value="1">Chaise roulante</option>
				<option value="2">Aveugle</option>
				<option value="3">Sourd</option>
				<option value="4">Mineur non accompagné -> 50 €</option>
				<!-- <input type="submit" value="Ajouter"> -->
			</select>
			<br>
            
			<label for="meal">Repas:</label>
			<p>Choisissez le repas qui vous convient</p>
			<select id="meal" name="meal">
                <option value="0"></option>
				<option value="1">Végétarien -> 20 €</option>
				<option value="2">Halal -> 20 €</option>
				<option value="3">Casher -> 20 €</option>
				<input type="submit" value="Ajouter">
                
			</select>
			<br>
		</form>
        <?php var_dump($_POST) ?>
	</div>
