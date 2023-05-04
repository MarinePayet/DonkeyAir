<?php

class Flight
{

    public static function findByDestination($destination) {

        $db = DataBase::getPdo();
        $statement = $db->query('SELECT *, city FROM flights
			LEFT JOIN airports ON airports.airport_id = flights.arrival_airport_id
			WHERE arrival_airport_id = ' . $destination);
			$statement->execute();
			$flights = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $flights;
    }

    public static function returnToParis($destination) {

        $db = DataBase::getPdo();
        $statement = $db->query('SELECT * FROM flights WHERE departure_airport_id = ' . $destination);
        $statement->execute();
        $flights = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $flights;
    }
    
    // public static function updateSeatsAvailable(){
    //     $db = DataBase::getPdo();
    //     $statement = $db->query('SELECT users.user_id, go_flight_id.flight_id as go_flight_id, go_available_seats.available_seats as go_available_seats,
    //     go_capacity.capacity as go_capacity, bookings.booking_id, bookings.nb_pax, bookings.status
    //     FROM bookings
    //     LEFT JOIN users ON users.user_id = bookings.user_id
    //     LEFT JOIN flights as go_flight_id ON go_flight_id.flight_id = bookings.flight_go_id
    //     LEFT JOIN flights as go_available_seats ON go_available_seats.flight_id = bookings.flight_go_id
    //     LEFT JOIN flights as go_capacity ON go_capacity.flight_id = bookings.flight_go_id;');
    //     $statement->execute();
    //     $bookings = $statement->fetchAll(PDO::FETCH_ASSOC);

    //     var_dump($bookings);
    //     for($i=0; $i<count($bookings); $i++){
    //         if($bookings[$i]['status'] === 'booked'){
    //             $go_capacity = $bookings[$i]['go_capacity'];
    //             $nb_pax = $bookings[$i]['nb_pax'];
    //             $go_flight_id = $bookings[$i]['go_flight_id'];

    //             $stmt = $db->query('UPDATE flights SET available_seats = '. $go_capacity - $nb_pax . ' WHERE flight_id = ' . $go_flight_id . ";");
    //             $stmt->execute();
    //             $capMoinsPax = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //             var_dump($capMoinsPax);
                
    //         }



    //     }


    //     // return $bookings;



    // }
    


}


    