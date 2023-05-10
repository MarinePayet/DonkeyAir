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
    
    
    public static function updateAvailableSeatsGo($lastBooking){

    $db = DataBase::getPdo();
    $statement = $db->query('SELECT users.user_id, go_flight_id.flight_id as go_flight_id, go_available_seats.available_seats as go_available_seats, go_capacity.capacity as go_capacity,
    bookings.booking_id, bookings.nb_pax, bookings.status
    FROM bookings
    LEFT JOIN users ON users.user_id = bookings.user_id
    LEFT JOIN flights as go_flight_id ON go_flight_id.flight_id = bookings.flight_go_id
    LEFT JOIN flights as go_available_seats ON go_available_seats.flight_id = bookings.flight_go_id
    LEFT JOIN flights as go_capacity ON go_capacity.flight_id = bookings.flight_go_id
    WHERE booking_id = '. $lastBooking . ';');
    $statement->execute();
    $bookings = $statement->fetchAll(PDO::FETCH_ASSOC);



        if($bookings[0]['status'] === 'booked'){
            $go_available_seats = $bookings[0]['go_available_seats'];
            $nb_pax = $bookings[0]['nb_pax'];
            $go_flight_id = $bookings[0]['go_flight_id'];
            
            $stmt = $db->query('UPDATE flights SET available_seats = '. $go_available_seats - $nb_pax . ' WHERE flight_id = ' . $go_flight_id . ";");

            $newFlight = $stmt->execute();
            

        }
        



    }
    public static function updateAvailableSeatsReturn($lastBooking){

        $db = DataBase::getPdo();
        $statement = $db->query('SELECT users.user_id, return_flight_id.flight_id as return_flight_id, return_available_seats.available_seats as return_available_seats, return_capacity.capacity as return_capacity,
        bookings.booking_id, bookings.nb_pax, bookings.status
        FROM bookings
        LEFT JOIN users ON users.user_id = bookings.user_id
        LEFT JOIN flights as return_flight_id ON return_flight_id.flight_id = bookings.flight_return_id
        LEFT JOIN flights as return_available_seats ON return_available_seats.flight_id = bookings.flight_return_id
        LEFT JOIN flights as return_capacity ON return_capacity.flight_id = bookings.flight_return_id
        WHERE booking_id = '. $lastBooking . ';');
        $statement->execute();
        $bookingsRet = $statement->fetchAll(PDO::FETCH_ASSOC);
    
        if($bookingsRet[0]['status'] === 'booked'){
            $return_available_seats = $bookingsRet[0]['return_available_seats'];
            $nb_pax = $bookingsRet[0]['nb_pax'];
            $return_flight_id = $bookingsRet[0]['return_flight_id'];
            
            $stmt = $db->query('UPDATE flights SET available_seats = '. $return_available_seats - $nb_pax . ' WHERE flight_id = ' . $return_flight_id . ";");
            var_dump($stmt);
            $newFlightRet = $stmt->execute();
            
        }
            
    
    }
    
    public static function queryRecapGo($goId){
        $db = DataBase::getPdo();
        $statement = $db->query('SELECT go_airport.city as go_airport, arrival_airport.city as arrival_airport, departure_time, arrival_time, flight_number, price
            FROM flights
            LEFT JOIN airports as go_airport ON go_airport.airport_id = flights.departure_airport_id
            LEFT JOIN airports as arrival_airport ON arrival_airport.airport_id = flights.arrival_airport_id
            WHERE flight_id = ' . $goId);
        $statement->execute();
        return $flights = $statement->fetchAll(PDO::FETCH_ASSOC);
        
    }


    public static function queryRecapReturn($returnId){

        $db = DataBase::getPdo();
        $statement = $db->query('SELECT return_airport.city as return_airport, arrival_airport.city as arrival_airport, departure_time, arrival_time, flight_number, price
            FROM flights
            LEFT JOIN airports as return_airport ON return_airport.airport_id = flights.departure_airport_id
            LEFT JOIN airports as arrival_airport ON arrival_airport.airport_id = flights.arrival_airport_id
            WHERE flight_id = ' . $returnId);
        $statement->execute();
        return $flights = $statement->fetchAll(PDO::FETCH_ASSOC);

    }


}


    