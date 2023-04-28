<?php

class Booking 
{
    public static function listBookingAller()
    { 
        $db = Database::getPdo();
        $statement = $db->query(' SELECT users.name, flights_go.flight_number as flight_go, airports.city as airport_arrival, departure_time, price
        FROM bookings 
        LEFT JOIN users ON users.user_id = bookings.user_id 
        LEFT JOIN flights as flights_go ON flights_go.flight_id = bookings.flight_go_id
        LEFT JOIN airports ON airports.airport_id = flights_go.arrival_airport_id;');
        $bookings = $statement->fetchall();

        var_dump($bookings);
        foreach ($bookings as $booking){ ?>

            <tr>
                <td><?php echo $booking['name'] ?></td>          
                <td>DATE DU VOL ALLER</td>
                <td><?php echo $booking['airport_arrival'] ?></td>
                <td><?php echo $booking['departure_time'] ?></td>
                <td><?php echo $booking['flight_go'] ?></td>
                <td><?php echo $booking['price'] ?></td>
            
        <?php } ?>
    <?php  }

public static function listBookingRetour()
{ 
    $db = Database::getPdo();
    $statement = $db->query(' SELECT users.name, flights_return.flight_number as flight_return, airports.city as airport_arrival, arrival_time, price
    FROM bookings 
    LEFT JOIN users ON users.user_id = bookings.user_id 
    LEFT JOIN flights as flights_return ON flights_return.flight_id = bookings.flight_return_id
    LEFT JOIN airports ON airports.airport_id = flights_return.arrival_airport_id;');
    $bookings = $statement->fetchall();

    var_dump($bookings);
    foreach ($bookings as $booking){ ?>
  
            <td>DATE DU VOL RETOUR</td>
            <td><?php echo $booking['airport_arrival'] ?></td>
            <td><?php echo $booking['arrival_time'] ?></td>
            <td><?php echo $booking['flight_return'] ?></td>
            <td><?php echo $booking['price'] ?></td>
        </tr>    
    <?php } ?>
<?php  }


} ?>

