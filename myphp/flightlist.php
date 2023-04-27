<?php

require_once 'header.php';
require_once 'footer.php';
require_once 'Database.php'
?>
<title>Liste de vols</title>


<!-- <?php



?> -->

<div class="container-xl">
	<br>
	<div class="table-responsive">
		<table class=" table table-striped table-hover ">

			<p class="text-uppercase fw-bold fs-4">Vol Aller le <?php echo $_POST['date_depart'];?> </p>
			<tr class="table">
				
				<th>Heure de depart</th>
				<th>heure d'arriver</th>
				<th>Numéro de vol</th>
				<th>place disponible</th>
				<th>prix</th>
				<th>action</th>
				
			</tr>


<?php

$db= DataBase::getPdo();
$statement=$db->query('SELECT * FROM flights');
$statement->execute();
$flights = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($flights as $flight)
{
$arrival_time = $flight['arrival_time'];
$departure_time = $flight['departure_time'];
$flight_number = $flight['flight_number'];
$available_seats = $flight['available_seats'];
$price = $flight['price'];
}	

var_dump($flight)
?>

			<tr>
				<td><?php echo $departure_time=$flight['departure_time'];?></td>
				<td><?php echo $arrival_time = $flight['arrival_time'];?></td>
				<td><?php echo $flight_number = $flight['flight_number'];?></td>
				<td><?php echo $available_seats = $flight['available_seats'];?></td>
				<td><?php echo $price = $flight['price'];?></td>
				<td><input class="btn btn-primary" type="submit" value="ajouter"></td>
         		
			</tr>
			<tr>
				
			<td><?php echo $departure_time=$flight['departure_time'];?></td>
				<td><?php echo $arrival_time = $flight['arrival_time'];?></td>
				<td><?php echo $flight_number = $flight['flight_number'];?></td>
				<td><?php echo $available_seats = $flight['available_seats'];?></td>
				<td><?php echo $price = $flight['price'];?></td>
				
				<td>
					<input class="btn btn-primary" type="submit" value="ajouter">
				</td>
			</tr>
			<tr>
				
			<td><?php echo $flight['departure_time'];?></td>
				<td><?php echo $flight['arrival_time'];?></td>
				<td><?php echo $flight['flight_number'];?></td>
				<td><?php echo $flight['available_seats'];?></td>
				<td><?php echo $flight['price'];?></td>
				<td>
					<input class="btn btn-primary" type="submit" value="ajouter">
				</td>
			</tr>




		</table>
	</div><br>
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<p class="text-uppercase fw-bold fs-4">Vol retour le <?php echo $_POST['date_retour'];?></p>
			<tr class="table">
				
				<th>Heure de depart</th>
				<th>heure d'arriver</th>
				<th>Numéro de vol</th>
				<th>place disponible</th>
				<th>prix</th>
				<th></th>
				
			</tr>
			<tr>
			
			<td><?php echo $flight['departure_time'];?></td>
				<td><?php echo $flight['arrival_time'];?></td>
				<td><?php echo $flight['flight_number'];?></td>
				<td><?php echo $flight['available_seats'];?></td>
				<td><?php echo $flight['price'];?></td>
				<td>
					<input class="btn btn-primary" type="submit" value="ajouter">
				</td>

			</tr>
			<tr>
				
			<td><?php echo $flight['departure_time'];?></td>
				<td><?php echo $flight['arrival_time'];?></td>
				<td><?php echo $flight['flight_number'];?></td>
				<td><?php echo $flight['available_seats'];?></td>
				<td><?php echo $flight['price'];?></td>
				<td>
					<input class="btn btn-primary" type="submit" value="ajouter">
				</td>
			</tr>
			<tr>
				
			<td><?php echo $flight['departure_time'];?></td>
				<td><?php echo $flight['arrival_time'];?></td>
				<td><?php echo $flight['flight_number'];?></td>
				<td><?php echo $flight['available_seats'];?></td>
				<td><?php echo $flight['price'];?></td>
				<td>
					<input class="btn btn-primary" type="submit" value="ajouter">
				</td>
			</tr>

		</table>

	</div>

	

<?php

if (isset($_POST['departs'])); {
	$depart = $_POST['departs'];
	$destination = $_POST['destination'];
	$date_depart = $_POST['date_depart'];
	$date_retour = $_POST['date_retour'];
	$passagers = $_POST['passagers'];
}









?>




	


















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

