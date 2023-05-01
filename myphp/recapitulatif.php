<?php
require_once 'header.php';
require_once 'footer.php';
require_once 'Database.php';
require_once 'Passenger.php';


?>

<div class="div-recap">
    <div class="div-recap-dedans">
        <h5>🛫 Vol Aller</h5>
        <p><?php echo $_SESSION['date_depart']?></p>
        
        <div class="div-recap div-info">
            <div>
                <?php

                if(isset($_SESSION['go_id'])){
                    $db = DataBase::getPdo();
                    $statement = $db->query('SELECT go_airport.city as go_airport, arrival_airport.city as arrival_airport, departure_time, arrival_time, flight_number, price
                        FROM flights
                        LEFT JOIN airports as go_airport ON go_airport.airport_id = flights.departure_airport_id
                        LEFT JOIN airports as arrival_airport ON arrival_airport.airport_id = flights.arrival_airport_id
                        WHERE flight_id = ' . $_SESSION['go_id']);
                    $statement->execute();
                    $flights = $statement->fetchAll(PDO::FETCH_ASSOC);

                    foreach($flights as $flight):?> 
                                <p><?php echo $flight['departure_time']?> </p> 
                                <p><?php echo $flight['go_airport']?> </p> 
                            </div>
                            <div><h1>✈️</h1></div>
                            <div>
                                <p><?php echo $flight['arrival_time']?> </p> 
                                <p><?php echo $flight['arrival_airport']?> </p> 
                                
                            </div>
                        </div>
                        <div class="div-info-vol">
                                    <p>Numero de vol : <?php echo $flight['flight_number']?></p>
                                </div>
                                <div class="div-recap">
                                    <div>
                                        <p>Tarifs : <?php echo $flight['price']?> €</p>
                                    </div>

                                </div>
                            </div>
                                <?php
                    endforeach;
                }
?>

    <div class="div-recap-dedans">
        <h5>🛬 Vol Retour</h5>
        <p><?php echo $_SESSION['date_retour']?></p>
        <div class="div-recap div-info">
            <div>

            <?php 

                if(isset($_SESSION['return_id'])){
                    $db = DataBase::getPdo();
                    $statement = $db->query('SELECT return_airport.city as return_airport, arrival_airport.city as arrival_airport, departure_time, arrival_time, flight_number, price
                        FROM flights
                        LEFT JOIN airports as return_airport ON return_airport.airport_id = flights.departure_airport_id
                        LEFT JOIN airports as arrival_airport ON arrival_airport.airport_id = flights.arrival_airport_id
                        WHERE flight_id = ' . $_SESSION['return_id']);
                    $statement->execute();
                    $flights = $statement->fetchAll(PDO::FETCH_ASSOC);

                    foreach($flights as $flight):?> 
                                <p><?php echo $flight['departure_time']?> </p> 
                                <p><?php echo $flight['return_airport']?> </p> 
                            </div>
                            <div><h1>✈️</h1></div>
                            <div>
                                <p><?php echo $flight['arrival_time']?> </p> 
                                <p><?php echo $flight['arrival_airport']?> </p> 
                                
                            </div>
                        </div>
                        <div class="div-info-vol">
                            <p>Numero de vol : <?php echo $flight['flight_number']?></p>
                        </div>
                                <div class="div-recap">
                                    <div>
                                        <p>Tarifs : <?php echo $flight['price']?> €</p>
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

<h2>PASSAGERS</h2>

<div class="container">
    <div class="form-box">
        <form action= "#" method= "post">
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
                <label for="name">Nom Prénom :</label>
                <input type="text" id="name" name="name">
            </div>

            <div class="form-pax">
                <label for="email">E-mail :</label>
                <input type="email" id="email" name="email">
            </div>

            <div class="form-pax">
                <label for="phone">Téléphone :</label>
                <input type="tel" id="phone" name="phone">
            </div>

            <div class="form-pax">
                <label for="dateNaissance">Date de naissance :</label>
                <input type="date" id="dateNaissance" name="birthdate">
            </div>

            <div class="form-pax">
                <label for="passport_number">Numéro de passeport :</label>
                <input type="text" id="passport_number" name="passport_number">
            </div>

            <input type="submit" value="Enregistrer">

        </form>
     </div>
</div>

<?php

$passenger_id = $_POST['passenger_id'];

// Connexion à la base de données
$db = DataBase::getPdo();

// Récupération des informations du passager
$passenger = Passenger::getPassenger($db, 1); // Remplacez $passenger_id par l'ID du passager que vous souhaitez récupérer

?>

<div class="div-recap">
    <div class="div-recap-dedans">
        <div class="div-info-vol"> 
            <h5>Passagers </h5>
        </div>
        <p>Nom et prénom : <?php echo $passenger['name']; ?></p>
        <p>Date de naissance : <?php echo $passenger['birthdate']; ?></p>
        <p>Numéro de téléphone : <?php echo $passenger['phone_number']; ?></p>
        <p>Adresse e-mail : <?php echo $passenger['email']; ?> </p>
    </div>
</div>

</br>
<div class="div-recap">
    <div class="div-recap-dedans">
        <div class="div-info-vol"> 
            <h5>Options </h5>
        </div>
        <p>Options 1</p>
        <p>Options 2</p>
        <p>Options 3</p>
    </div>
</div>

<?php

Passenger::createPassenger();





