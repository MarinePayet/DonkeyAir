<?php

require_once 'Database.php';


class Passenger {
    

    public static function createPassenger() {

        $db = Database::getPdo();
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $birthdate = $_POST['birthdate'];
        $passport_number = $_POST['passport_number'];
        $query = 'INSERT INTO passengers (name, email, phone, birthdate, passport_number) VALUES (:name, :email, :phone, :birthdate, :passport_number)';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':name', $name, \PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, \PDO::PARAM_STR);
        $stmt->bindValue(':phone', $phone, \PDO::PARAM_STR);
        $stmt->bindValue(':birthdate', $birthdate, \PDO::PARAM_STR);
        $stmt->bindValue(':passport_number', $passport_number, \PDO::PARAM_STR);
        $stmt->execute();

        $passenger_id = $db->lastInsertId();
        return $passenger_id;
    }

    

    public static function getPassenger($passenger_id) {
        $db = Database::getPdo();
        $query = 'SELECT * FROM passengers WHERE id = :passenger_id';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':passenger_id', $passenger_id);
        $stmt->execute();
        $passenger = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $passenger;
        var_dump ($passenger);

    }
    
}
