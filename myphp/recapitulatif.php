<?php
require_once 'header.php';
require_once 'footer.php';
require_once 'Database.php';
require_once 'Passenger.php';


?> 

<div class="div-recap">
    <div class="div-recap-dedans">
        <h5>🛫 Vol Aller</h5>
        <p><?php echo $_SESSION['go_id'] ?></p>
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
    <p><?php echo $_SESSION['return_id'] ?></p>
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
<?php
                endforeach;
            }

?>

</div>
</div>

</div>
</br>



<div class="div-recap">
    <div class="div-recap-dedans">
        <div class="div-info-vol">
            <h5>Passagers </h5>
        </div>
        <p>Nom et prénom : <?php echo $passenger['name']; ?></p>
        <p>Date de naissance : <?php echo $passenger['birthdate']; ?></p>
        <p>Numéro de téléphone : <?php echo $passenger['phone']; ?></p>
        <p>Adresse e-mail : <?php echo $passenger['email']; ?> </p>
    </div>
</div>
</div>

</br>
<div class="div-recap">
    <div class="div-recap-dedans">
        <div class="div-info-vol">
            <h5>Options </h5>
        </div>
        <p><?php echo $_POST['vip_access']; ?></p>
        <p><?php echo $_POST['seats']; ?></p>
        <p><?php echo $_POST['luggage']; ?></p>
        <p><?php echo $_POST['pmr-assistance']; ?></p>
        <p><?php echo $_POST['meal']; ?></p>
        


    </div>
</div>
