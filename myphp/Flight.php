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
			
    public static function selectGoFlight($go_id){
        $db = DataBase::getPdo();
        $statement = $db->query('SELECT * FROM flights WHERE flight_id = ' . $go_id);
        $statement->execute();
		$flights = $statement->fetchAll(PDO::FETCH_ASSOC);
        var_dump($flights);
        $idToUse = $flights['0']['flight_id'];
        
        echo "ex date " . $flights['0']['date'] . " et id to use " . $idToUse;
        
        return $idToUse;
        
    }

    public static function updateGoFlight($go_id){
        $db = DataBase::getPdo();
        var_dump($_SESSION['go_date']);
        $date = trim($_SESSION['go_date']);
        $statement = $db->prepare('UPDATE flights SET date = "' .  $date  . '" WHERE flight_id = ' . $go_id);
        var_dump($statement);
        // $statement->bindValue(':date', $date, \PDO::PARAM_STR);
        $statement->execute();
        $flights = $statement->fetchAll(PDO::FETCH_ASSOC);
        var_dump($go_id);
        var_dump($flights);

        
        echo "new date = " . $flights['0']['date'];

        return  $flights;

    }


}


    