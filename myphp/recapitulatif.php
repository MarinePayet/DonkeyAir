<?php
require_once 'header.php';
require_once 'footer.php';
require_once 'Database.php'


?>



<div class="div-recap">
    <div class="div-recap-dedans">
        <h5>🛫 Vol Aller</h5>
        <p>Jour Date Mois Année</p>
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
                                    <p>Durée de vol :</p> 
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
        <p>Jour Date Mois Année</p>
        <div class="div-recap div-info">
            <div>
                <p>HEURE</p>
                <p>AIRPORT</p>
            </div>
            <div><h1>✈️</h1></div>
            <div>
                <p>HEURE</p>
                <p>AIRPORT</p>    
            </div>
        </div>
        <div class="div-info-vol">
            <p>Numero de vol :</p>
            <p>Durée de vol :</p> 
        </div>
        <div class="div-recap">
            <div>
                <p>Tarifs :</p>
            </div>
            <div>
                <p>
                    €
                </p>
            </div>
        </div>
    </div>
    
</div>
</br>
<div class="div-recap">
    <div class="div-recap-dedans">
        <div class="div-info-vol"> 
            <h5>Passagers </h5>
        </div>
        <p>NOM PRENOM : NOM PRENOM</p>
        <p>Date de naissance : JJ/MM/AAA</p>
        <p>Numéro de Téléphone : 0123456789</p>
        <p>Adresse e-mail : @ </p>
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





