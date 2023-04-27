<?php

require_once 'header.php';
require_once 'footer.php';
require_once 'Database.php'
?>
<title>Liste de vols</title>


<!-- <?php



?> -->
<?php
if(isset($_POST['destination'])){
	echo $_POST['destination'];
}
?>

<div class="container-xl">
	<br>
	<div class="table-responsive">
		<table class=" table table-striped table-hover ">

			<p class="text-uppercase fw-bold fs-4">Vol Aller</p>
			<tr class="table">
				<th>Date</th>
				<th>Heure</th>
				<th>Numéro de vol</th>
				<th>prix</th>
				<th></th>
				<th></th>
			</tr>


			<tr>
				<td>26 avril 2023</td>
				<td>10:00</td>
				<td>AB123</td>
				<td>450€</td>
				<td>
					<input class="btn btn-primary" type="submit" value="ajouter">
				</td>
			</tr>
			<tr>
				<td>27 avril 2023</td>
				<td>14:30</td>
				<td>CD456</td>
				<td>€</td>
				<td>
					<input class="btn btn-primary" type="submit" value="ajouter">
				</td>
			</tr>
			<tr>
				<td>28 avril 2023</td>
				<td>08:15</td>
				<td>EF789</td>
				<td>€</td>
				<td>
					<input class="btn btn-primary" type="submit" value="ajouter">
				</td>
			</tr>




		</table>
	</div><br>
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<p class="text-uppercase fw-bold fs-4">Vol retour</p>
			<tr class="table">
				<th>Date</th>
				<th>Heure</th>
				<th>Numéro de vol</th>
				<th>prix</th>
				<th></th>
				<th></th>
			</tr>
			<tr>
				<td>26 avril 2023</td>
				<td>10:00</td>
				<td>AB123</td>
				<td>450€</td>
				<td>
					<input class="btn btn-primary" type="submit" value="ajouter">
				</td>

			</tr>
			<tr>
				<td>27 avril 2023</td>
				<td>14:30</td>
				<td>CD456</td>
				<td>€</td>
				<td>
					<input class="btn btn-primary" type="submit" value="ajouter">
				</td>
			</tr>
			<tr>
				<td>28 avril 2023</td>
				<td>08:15</td>
				<td>EF789</td>
				<td>€</td>
				<td>
					<input class="btn btn-primary" type="submit" value="ajouter">
				</td>
			</tr>

		</table>

	</div>

	
	<div class="optionbox">
	<p class="text-uppercase fw-bold fs-4">Mes Options de voyage</p>
		<form>
			<label for="vip-access">VIP Acces:</label>
			<p>Accès au salon - Accès prioritaire aux controles</p>
			<select id="vip-access" name="vip-access">
				<option value="0"></option>
				<option value="50">50 €</option>
				<input type="submit" value="Ajouter">
			</select>
			<br>

			<label for="seat-exit">Siège Premium:</label>
			<p>Espace prévilégié - Confortable et ajustable - Ecran vidéo </p>
			<select id="seat-exit" name="seat-exit">
				<option value="0"></option>
				<option value="1">Siège 1A -> 25 €</option>
				<option value="2">Siege 1C -> 25 €</option>
				<input type="submit" value="Ajouter">
			</select>
			<br>

			<label for="luggage">Bagages:</label>
			<p>Franchise bagage adaptée à vos besoins</p>
			<select id="luggage" name="luggage">
				<option value="0">0 BAG</option>
				<option value="1">1PC 23KG -> 70 €</option>
				<option value="2">2PC 23KG -> 160 €</option>
				<option value="3">3PC 23KG -> 250 €</option>
				<input type="submit" value="Ajouter">
			</select>
			<br>

			<label for="pmr-assistance">Assistance PMR:</label>
			<p>A vos côtés pour vous assister </p>
			<select id="pmr-assistance" name="pmr-assistance">
				<option value="0"></option>
				<option value="1">WCHR</option>
				<option value="2">BLND</option>
				<option value="3">DEAF</option>
				<option value="4">UMNR -> 50 €</option>
				<input type="submit" value="Ajouter">
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
	</div>
</div>
<div class="sticky-bar">
	<div class="total">Total à payer :     <span id="total">800€</span></div>
	<button id="valider">Valider</button>
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