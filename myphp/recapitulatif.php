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
            <h5><?php echo date('d-m-Y', strtotime($_SESSION['go_date'])); ?></h5>
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
        <h5><?php echo date('d-m-Y', strtotime($_SESSION['return_date'])); ?></h5>
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


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nb_pax = $_SESSION['nb_pax'];
    $passengers = [];
    
    for ($i = 0; $i < $nb_pax; $i++) {
        $name = $_POST['name'][$i];
        $email = $_POST['email'][$i];
        $phone = $_POST['phone'][$i];
        $birthdate = $_POST['birthdate'][$i];
        $passport_number = $_POST['passport_number'][$i];

        $passenger = Passenger::createPassenger($name, $email, $phone, $birthdate, $passport_number);
            $passengers[] = $passenger;
    }
    
        $_SESSION['passengers'] = $passengers;

}

?>


</br>
<?php var_dump($_SESSION['nb_pax']) ?>

<div class="div-recap">
    <div class="div-recap-dedans">
        <div class="div-info-vol">
            
                    </div>

<p><?php echo "Nombre de voyageur : " . $_SESSION['nb_pax'] ?></p><?php
$paxpax = Passenger::viewPax($_SESSION['nb_pax']);
for ($i = 0; $i < $_SESSION['nb_pax']; $i++) {
    $pax = $paxpax[$i];
?>
    <h5>Passager <?php echo $i+1; ?></h5>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Informations du passager</h5>
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

