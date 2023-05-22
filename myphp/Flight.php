<?php

class Flight
{

    public static function findByDestination($destination) {

        $db = DataBase::getPdo();
        $statement = $db->query('SELECT flights.id as flight_id, flight_number, departure_airport_id, departure_time, arrival_airport_id, arrival_time, price, available_seats,capacity, city 
            FROM flights 
			LEFT JOIN airports ON airports.id = flights.arrival_airport_id
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
    $statement = $db->query('SELECT users.id, go_flight_id.id as go_flight_id, go_available_seats.available_seats as go_available_seats, go_capacity.capacity as go_capacity,
    bookings.id, bookings.nb_pax, bookings.status
    FROM bookings
    LEFT JOIN users ON users.id = bookings.user_id
    LEFT JOIN flights as go_flight_id ON go_flight_id.id = bookings.flight_go_id
    LEFT JOIN flights as go_available_seats ON go_available_seats.id = bookings.flight_go_id
    LEFT JOIN flights as go_capacity ON go_capacity.id = bookings.flight_go_id
    WHERE bookings.id = '. $lastBooking . ';');
    $statement->execute();
    $bookings = $statement->fetchAll(PDO::FETCH_ASSOC);



        if($bookings[0]['status'] === 'booked'){
            $go_available_seats = $bookings[0]['go_available_seats'];
            $nb_pax = $bookings[0]['nb_pax'];
            $go_flight_id = $bookings[0]['go_flight_id'];
            
            $stmt = $db->query('UPDATE flights SET available_seats = '. $go_available_seats - $nb_pax . ' WHERE flights.id = ' . $go_flight_id . ";");

            $newFlight = $stmt->execute();
            

        }
        



    }
    public static function updateAvailableSeatsReturn($lastBooking){

        $db = DataBase::getPdo();
        $statement = $db->query('SELECT users.id, return_flight_id.id as return_flight_id, return_available_seats.available_seats as return_available_seats, return_capacity.capacity as return_capacity,
        bookings.id, bookings.nb_pax, bookings.status
        FROM bookings
        LEFT JOIN users ON users.id = bookings.user_id
        LEFT JOIN flights as return_flight_id ON return_flight_id.id = bookings.flight_return_id
        LEFT JOIN flights as return_available_seats ON return_available_seats.id = bookings.flight_return_id
        LEFT JOIN flights as return_capacity ON return_capacity.id = bookings.flight_return_id
        WHERE bookings.id = '. $lastBooking . ';');
        $statement->execute();
        $bookingsRet = $statement->fetchAll(PDO::FETCH_ASSOC);
    
        if($bookingsRet[0]['status'] === 'booked'){
            $return_available_seats = $bookingsRet[0]['return_available_seats'];
            $nb_pax = $bookingsRet[0]['nb_pax'];
            $return_flight_id = $bookingsRet[0]['return_flight_id'];
            
            $stmt = $db->query('UPDATE flights SET available_seats = '. $return_available_seats - $nb_pax . ' WHERE flights.id = ' . $return_flight_id . ";");
            var_dump($stmt);
            $newFlightRet = $stmt->execute();
            
        }
            
    
    }
    
    public static function queryRecapGo($goId){
        $db = DataBase::getPdo();
        $statement = $db->query('SELECT go_airport.city as go_airport, arrival_airport.city as arrival_airport, departure_time, arrival_time, flight_number, price
            FROM flights
            LEFT JOIN airports as go_airport ON go_airport.id = flights.departure_airport_id
            LEFT JOIN airports as arrival_airport ON arrival_airport.id = flights.arrival_airport_id
            WHERE flights.id = ' . $goId);
        $statement->execute();
        return $flights = $statement->fetchAll(PDO::FETCH_ASSOC);
        
    }


    public static function queryRecapReturn($returnId){

        $db = DataBase::getPdo();
        $statement = $db->query('SELECT return_airport.city as return_airport, arrival_airport.city as arrival_airport, departure_time, arrival_time, flight_number, price
            FROM flights
            LEFT JOIN airports as return_airport ON return_airport.id = flights.departure_airport_id
            LEFT JOIN airports as arrival_airport ON arrival_airport.id = flights.arrival_airport_id
            WHERE flights.id = ' . $returnId);
        $statement->execute();
        return $flights = $statement->fetchAll(PDO::FETCH_ASSOC);

    }


}


    