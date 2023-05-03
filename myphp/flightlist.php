<?php

require_once 'header.php';
require_once 'footer.php';
require_once 'Database.php';
require_once 'Flight.php';

?>
<title>Liste de vols</title>

<div class="container-xl">
	<br>
	<?php
	 if(isset($_POST['pax'])) { 

        $_SESSION['nb_pax'] = $_POST['pax'];
    }
    
		
		if (isset($_POST['date_depart'])) {
			$_SESSION['go_date'] = $_POST['date_depart'];
		}
	?>
	
	<div class="table-responsive">
		<table class=" table table-striped table-hover ">
			<?php 
			$flights = Flight::findByDestination($_POST['destination']) ?>
			
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
			$flights = Flight::findByDestination($_POST['destination']);
			
			foreach ($flights as $flight) { ?>

				<tr>
					<td><?php echo $flight['departure_time']; ?></td>
					<td><?php echo $flight['arrival_time']; ?></td>
					<td><?php echo $flight['flight_number']; ?></td>
					<td><?php echo $flight['capacity'] - $flight['available_seats']; ?></td>
					<td><?php echo $flight['price']; ?></td>
					<td><button type="button" class="btn btn-primary" onclick="fetchData('go_id', <?php echo $flight['flight_id']; ?>)">Choisir</button></td>

					<?php if (isset($_SESSION['go_id']) && $flight['flight_id'] === $_SESSION['go_id']) {
						echo "<td>choisi</td>";
					} ?>
				</tr>
			<?php }	?>

		</table>
	</div>
	<br>
	<div class="table-responsive">
		<table class="table table-striped table-hover">
		<?php $_SESSION['return_date'] = $_POST['date_retour']?>
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
				$flights = Flight::returnToParis($_POST['destination']);
				
				foreach ($flights as $flight) {
				?>
					<td><?php echo $flight['departure_time']; ?></td>
					<td><?php echo $flight['arrival_time']; ?></td>
					<td><?php echo $flight['flight_number']; ?></td>
					<td><?php echo $flight['capacity'] - $flight['available_seats']; ?></td>
					<td><?php echo $flight['price']; ?></td>
					<td><button type="button" class="btn btn-primary" onclick="fetchData('return_id', <?php echo $flight['flight_id']; ?>)">Choisir</button></td>

					<?php if (isset($_SESSION['return_id']) && $flight['flight_id'] === $_SESSION['return_id']) {
						echo "<td>choisi</td>";
					} ?>
			</tr>
		<?php
				}
		?>
		</table>

	</div>
</div>
	<a href="recapitulatif.php">RECAP</a>

	<div class="sticky-bar">
	<?php if (isset($_SESSION['total_price'])) { ?>
		<p class="text-uppercase fw-bold fs-4">Prix par voyageur : <?php echo $_SESSION['total_price']; ?> €</p>
		<p class="text-uppercase fw-bold fs-4">prix pour <?php echo $_SESSION['nb_pax']. ' voyageurs : ' . $_SESSION['total_price']*$_SESSION['nb_pax'] ?> € </p>
		<p><a href="new_pax.php"> Ajouter des passagers </a></p><?php

	} else {

		echo " Sélectionnez un Aller & un Retour ";
	} ?>
	

	</div>








