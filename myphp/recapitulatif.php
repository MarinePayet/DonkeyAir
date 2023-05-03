<?php
require_once 'header.php';
require_once 'footer.php';
require_once 'Database.php';
require_once 'Passenger.php';


?> 

<div class="div-recap">
    <div class="div-recap-dedans">
        <h5>🛫 Vol Aller</h5>
        <div class="h5-date">
            <h5><?php echo date('d-m-Y',strtotime($_SESSION['go_date'])); ?></h5>
        </div>
        <div class="div-recap div-info">
            <div>
                <?php
                if (isset($_SESSION['go_id'])) {
                    $db = DataBase::getPdo();
                    $statement = $db->query('SELECT go_airport.city as go_airport, arrival_airport.city as arrival_airport, departure_time, arrival_time, flight_number, price
                        FROM flights
                        LEFT JOIN airports as go_airport ON go_airport.airport_id = flights.departure_airport_id
                        LEFT JOIN airports as arrival_airport ON arrival_airport.airport_id = flights.arrival_airport_id
                        WHERE flight_id = ' . $_SESSION['go_id']);
                    $statement->execute();
                    $flights = $statement->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($flights as $flight) : ?>
                        <p><?php echo $flight['departure_time'] ?> </p>
                        <p><?php echo $flight['go_airport'] ?> </p>
            </div>
            <div>
                <h1>✈️</h1>
            </div>
            <div>
                <p><?php echo $flight['arrival_time'] ?> </p>
                <p><?php echo $flight['arrival_airport'] ?> </p>

            </div>
        </div>
        <div class="div-info-vol">
            <p>Numero de vol : <?php echo $flight['flight_number'] ?></p>
        </div>
        <div class="div-recap">
            <div>
                <p>Tarifs : <?php echo $flight['price'] ?> €</p>
            </div>

        </div>
    </div>
<?php
                    endforeach;
                }
?>

<div class="div-recap-dedans">
    <h5>🛬 Vol Retour</h5>
    <div class="h5-date">
        <h5><?php echo date('d-m-Y',strtotime($_SESSION['return_date'])); ?></h5>
    </div>    
    <div class="div-recap div-info">
        <div>
            <?php
            if (isset($_SESSION['return_id'])) {
                $db = DataBase::getPdo();
                $statement = $db->query('SELECT return_airport.city as return_airport, arrival_airport.city as arrival_airport, departure_time, arrival_time, flight_number, price
                        FROM flights
                        LEFT JOIN airports as return_airport ON return_airport.airport_id = flights.departure_airport_id
                        LEFT JOIN airports as arrival_airport ON arrival_airport.airport_id = flights.arrival_airport_id
                        WHERE flight_id = ' . $_SESSION['return_id']);
                $statement->execute();
                $flights = $statement->fetchAll(PDO::FETCH_ASSOC);

                foreach ($flights as $flight) : ?>
                    <p><?php echo $flight['departure_time'] ?> </p>
                    <p><?php echo $flight['return_airport'] ?> </p>
        </div>
        <div>
            <h1>✈️</h1>
        </div>
        <div>
            <p><?php echo $flight['arrival_time'] ?> </p>
            <p><?php echo $flight['arrival_airport'] ?> </p>
        </div>
    </div>
    <div class="div-info-vol">
        <p>Numero de vol : <?php echo $flight['flight_number'] ?></p>
    </div>
    <div class="div-recap">
        <div>
            <p>Tarifs : <?php echo $flight['price'] ?> €</p>
        </div>

    </div>
</div>
</div>
<?php

                endforeach;
            }
?>
<form action="bookings.php" method="POST">
</br>
<div class="div-recap">
    <div class="div-recap-dedans">
        <div class="div-info-vol">
            <h5>Options </h5>
        </div>

        <?php 
        $totalOptions = 0;
        
        foreach($_POST as $k => $v) { 
            
            $totalOptions += $v; ?>

            <p><?php $k . "<br>";?></p>
            <?php 
            $newk = str_replace('_', ' ', $k);
            echo $newk ; 
            }

        echo "<br><br> Prix total des options : " . $totalOptions . "€"; ?>

    </div>
</div>
<div class="div-recap">
    <div class="div-recap-dedans">
        <?php echo "Total de votre voyage : " . $_SESSION['total_price']*$_SESSION['nb_pax'] + $totalOptions . ' €' ?>
    </div>
</div>

<button type="submit" class="btn btn-primary" ">Choisir</button></td>
</form>
</br>


<?php
var_dump($_POST);
$paxpax = Passenger::viewPax($_SESSION['nb_pax']);
for ($i = 0; $i < $_SESSION['nb_pax']; $i++) {
    $pax = $paxpax[$i];
?>
    <h5>Passager <?php echo $i+1; ?></h5>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Informations du passager</h5>
            <!-- <p class="card-text">Sexe: <?php echo $pax['sexe']; ?></p>   -->
            <p class="card-text">Nom: <?php echo $pax['name']; ?></p>
            <p class="card-text">Email: <?php echo $pax['email']; ?></p>
            <p class="card-text">Téléphone: <?php echo $pax['phone']; ?></p>
            <p class="card-text">Date de naissance: <?php echo $pax['birthdate']; ?></p>
            <p class="card-text">Numéro de passeport: <?php echo $pax['passport_number']; ?></p>
        </div>
    </div>
<?php
}
?>


        <p> Nombre de passagers = <?php echo $_SESSION['nb_pax']?></p>

</div>
</div>



