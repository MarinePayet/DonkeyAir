<?php

require_once 'header.php';
require_once 'footer.php';
require_once 'Database.php';

require_once 'saveflights.php';
?>
<title>Liste de vols</title>


<div class="container-xl">
	<br>
	<div class="table-responsive">
		<table class=" table table-striped table-hover ">
			<?php $db = DataBase::getPdo();
			$statement = $db->query('SELECT *, city FROM flights
			LEFT JOIN airports ON airports.airport_id = flights.arrival_airport_id
			WHERE arrival_airport_id = ' . $_POST['destination']);
			$statement->execute();
			$flights = $statement->fetchAll(PDO::FETCH_ASSOC);
			?>
			<p class="text-uppercase fw-bold fs-4">Vol Aller le <?php echo $_POST['date_depart'] . ' -> ' . $flights['0']['city']; ?> </p>



			<tr class="table">

				<th>Heure de depart</th>
				<th>Heure d'arrivée</th>
				<th>Numéro de vol</th>
				<th>Place disponible</th>
				<th>Prix</th>
				<th>Réserver</th>

			</tr>

			<?php
			$db = DataBase::getPdo();
			$statement = $db->query('SELECT *, city FROM flights 
			LEFT JOIN airports ON airports.airport_id = flights.arrival_airport_id
			WHERE arrival_airport_id = ' . $_POST['destination']);
			$statement->execute();
			$flights = $statement->fetchAll(PDO::FETCH_ASSOC);
			foreach ($flights as $flight) {
			?>

				<tr>
					<td><?php echo $flight['departure_time']; ?></td>
					<td><?php echo $flight['arrival_time']; ?></td>
					<td><?php echo $flight['flight_number']; ?></td>
					<td><?php echo $flight['capacity'] - $flight['available_seats']; ?></td>
					<td><?php echo $flight['price']; ?></td>

					<form method="post" action="saveflights.php">
						<input type="hidden" name="go_id" value="<?php echo $flight['flight_id']; ?>">

						<td><button type="submit" class="btn btn-primary">Choisir</button></td>

					</form>



          		<?php if(isset($_SESSION['go_id']) && $flight['flight_id'] === $_SESSION['go_id']) {
						echo "<td>choisi</td>";
					} ?>

				</tr>
			<?php
			}
			?>



		</table>
	</div><br>
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<p class="text-uppercase fw-bold fs-4">Vol retour le <?php echo $_POST['date_retour']; ?> -> PARIS</p>
			<tr class="table">

				<th>Heure de depart</th>
				<th>Heure d'arrivée</th>
				<th>Numéro de vol</th>
				<th>Place disponible</th>
				<th>Prix</th>
				<th>Réserver</th>

			</tr>
			<tr>


				<?php
				$db = DataBase::getPdo();
				$statement = $db->query('SELECT * FROM flights WHERE departure_airport_id = ' . $_POST['destination']);
				$statement->execute();
				$flights = $statement->fetchAll(PDO::FETCH_ASSOC);
				foreach ($flights as $flight) {
				?>


					<td><?php echo $flight['departure_time']; ?></td>
					<td><?php echo $flight['arrival_time']; ?></td>
					<td><?php echo $flight['flight_number']; ?></td>
					<td><?php echo $flight['capacity'] - $flight['available_seats']; ?></td>
					<td><?php echo $flight['price']; ?></td>
					<form method="post" action="saveflights.php">
						<input type="hidden" name="return_id" value="<?php echo $flight['flight_id']; ?>">


						<td><button type="submit" class="btn btn-primary">Choisir</button></td>
					</form>
					<?php if(isset($_SESSION['return_id']) && $flight['flight_id'] === $_SESSION['return_id']) {
						echo "<td>choisi</td>";
					} ?>

			</tr>
		<?php
				}
		?>
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
	<div <span id="total"><?php echo "<p>Le prix total est de " . $total_price ?></span></div>
	<button id="valider">Valider</button>

</div>
<?php if(isset($_SESSION['go_id']) && $flight['flight_id'] === $_SESSION['go_id']) {
						echo "<td>choisi</td>";
					} ?>


