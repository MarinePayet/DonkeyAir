<?php

class Booking 
{
    public static function listBooking()
    { 

    
        $db = Database::getPdo();
        $statement = $db->query(' SELECT users.name, flights_go.flight_number as flight_go, flights.departure_time, flights_return.flight_number as flight_return, airport_go.name as airport_go, airport_return.name as airport_return, flights.price
        FROM bookings 
        LEFT JOIN users ON users.user_id = bookings.user_id 
        LEFT JOIN flights as flights_go ON flights_go.flight_id = bookings.flight_go_id 
        LEFT JOIN flights as flights_return ON flights_return.flight_id = bookings.flight_return_id
        LEFT JOIN flights ON flights.price = bookings.flight_go_id
        LEFT JOIN airports as airport_go ON airport_go.airport_id = flights_go.departure_airport_id
        LEFT JOIN airports as airport_return ON airport_return.airport_id = flights_return.departure_airport_id;
        ');
        $bookings = $statement->fetchall();

        var_dump($bookings);
        foreach ($bookings as $booking){ ?>

<tr>
                <td><?php echo $booking['name'] ?></td>   
                
                <td>DATE DU VOL ALLER</td>
                <td><?php echo $booking['departure_time'] ?></td>
                <td><?php echo $booking['flight_go'] ?></td>
                <td><?php echo $booking['price'] ?></td>
                <td>DATE DU VOL RETOUR</td>
                <td><?php echo $booking['departure_time'] ?></td>
                <th><?php echo $booking['flight_return']?></th>
                <th><?php echo $booking['price'] ?></th>
            </tr>    
        <?php }


    }


    // <td>450€</td>


}