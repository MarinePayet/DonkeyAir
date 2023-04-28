<?php
require_once 'header.php';
require_once 'database.php';
require_once 'footer.php';
require_once 'Booking.php';
?>



<?php


    $db = Database::getPdo();
    $statement = $db->query('SELECT users.user_id, airports.city as airport_arrival, go_dpt_time.departure_time as go_dpt_time,go_dpt_time.date as go_date, return_dpt_time.departure_time as return_dpt_time, return_dpt_time.date as return_date, go_dpt_time.price as go_price, return_dpt_time.price as return_price
    FROM bookings 
    LEFT JOIN users ON users.user_id = bookings.user_id 
    LEFT JOIN flights as go_dpt_time ON go_dpt_time.flight_id = bookings.flight_go_id
    LEFT JOIN flights as return_dpt_time ON return_dpt_time.flight_id = bookings.flight_return_id
    LEFT JOIN airports ON airports.airport_id = go_dpt_time.arrival_airport_id
    WHERE users.user_id = ' . $_SESSION['user_id'] . ' ORDER BY go_date DESC');


    $resas = $statement->fetchall();
    
    foreach($resas as $resa):


        if ($resa['go_date'] >= date("Y-m-d")) {
            echo "futur";
        } else {
            echo 'passé';
        }
        


    ?> 
    <div class="div-recap">
        <div class="div-booking-dedans ">
            <div>
                <h5> Paris ✈️ <br><?php echo $resa['airport_arrival'] ?></h5>
            </div>

            <div class="div-booking-go">
                <div>
                    <p>ALLER</p>
                    <p><?php echo $resa['go_date'] ?></p>
                    <p><?php echo $resa['go_dpt_time'] ?></p>
                </div>
            </div>
            <div class="div-booking-go">
                <div>
                    <p>RETOUR</p>
                    <p><?php echo $resa['return_date'] ?></p>
                    <p><?php echo $resa['return_dpt_time'] ?></p>
                </div>
            </div>
            <div class="div-recap">
                <div>
                    <p>Tarifs :</p>
                    <p><?php echo $resa['go_price'] + $resa['return_price']?> €</p>

                </div>
        </div>
    </div>
    <?php endforeach ?>
</div>






























<!-- <table class="table table-striped table-hover "> -->

<!-- 

    <p class="text-uppercase fw-bold fs-4">Vol à Venir</p>
    <tr class="table-light">
        <th>username</th>    
        <th>Date Aller</th>
        <th>Destination</th>
        <th>Heure</th>
        <th>Numéro de vol</th>
        <th>prix</th>
        <th>Date Retour</th>
        <th>Destination</th>
        <th>Heure</th>
        <th>Numéro de vol</th>
        <th>prix</th>
        
    </tr> -->
    
    <!-- <?php Booking::listBookingAller(); 
    Booking::listBookingRetour(); ?> -->

<!--     
   
</table>
<table class="table table-striped table-hover">

    <p class="text-uppercase fw-bold fs-4">Vol effectués</p>
    <tr class="table-light">
        <th>Date Aller</th>
        <th>Heure</th>
        <th>Numéro de vol</th>
        <th>prix</th>
        <th>Date Retour</th>
        <th>Heure</th>
        <th>Numéro de vol</th>
        <th>prix</th>

    </tr>


    <tr>
        <td>26 avril 2023</td>
        <td>10:00</td>
        <td>AB123</td>
        <td>450€</td>

    </tr>
    <tr>
        <td>27 avril 2023</td>
        <td>14:30</td>
        <td>CD456</td>
        <td>€</td>

    </tr>
    <tr>
        <td>28 avril 2023</td>
        <td>08:15</td>
        <td>EF789</td>
        <td>€</td>

    </tr>

</table> -->