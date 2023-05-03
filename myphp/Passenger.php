<?php

require_once 'Database.php';


class Passenger {
    

    public static function createPassenger($name, $email, $phone, $birthdate, $passport_number) {

        $db = Database::getPdo();
        $query = 'INSERT INTO passengers (name, email, phone, birthdate, passport_number) VALUES (:name, :email, :phone, :birthdate, :passport_number)';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':name', $name, \PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, \PDO::PARAM_STR);
        $stmt->bindValue(':phone', $phone, \PDO::PARAM_STR);
        $stmt->bindValue(':birthdate', $birthdate, \PDO::PARAM_STR);
        $stmt->bindValue(':passport_number', $passport_number, \PDO::PARAM_STR);
        $stmt->execute();

        return self::getPassenger($db->lastInsertId());
    }

    

    public static function getPassenger($passenger_id) {
        $db = Database::getPdo();
        $query = 'SELECT * FROM passengers WHERE passenger_id = :passenger_id';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':passenger_id', $passenger_id);
        $stmt->execute();
        $passenger = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $passenger;
}

    public static function viewPax($nb_pax) {
        $db = Database::getPdo();
        $query = 'SELECT * FROM passengers
        ORDER BY passenger_id DESC
        LIMIT ' . $nb_pax;
        $stmt = $db->prepare($query);
        $stmt->execute();
        $view_pax= $stmt->fetchAll(\PDO::FETCH_ASSOC);
       
        return $view_pax;
        
        





        
    }


}