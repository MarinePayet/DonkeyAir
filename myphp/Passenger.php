<?php

require_once 'Database.php';


class Passenger {
    
    

    public static function createPassenger() {

        $db = Database::getPdo();
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $passport_number = $_POST['passport_number'];
        $query = 'INSERT INTO passengers (name, email, phone, passport_number) VALUES (:name, :email, :phone, :passport_number)';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':name', $name, \PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, \PDO::PARAM_STR);
        $stmt->bindValue(':phone', $phone, \PDO::PARAM_STR);
        $stmt->bindValue(':passport_number', $passport_number, \PDO::PARAM_STR);
        $stmt->execute();
    }

    // public function getPassengers() {
    //     $stmt = $this->pdo->query('SELECT * FROM passengers');
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }
}
