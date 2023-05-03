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
			
}