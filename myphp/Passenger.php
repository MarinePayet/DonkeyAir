<?php

require_once 'Database.php';


class Passenger {
    

    public static function createPassenger($lastname, $firstname, $email, $phone, $birthdate, $passport_number) {

        $db = Database::getPdo();
        $query = 'INSERT INTO passengers (lastname, firstname, email, phone, birthdate, passport_number) VALUES (:lastname, :firstname, :email, :phone, :birthdate, :passport_number)';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':lastname', $lastname, \PDO::PARAM_STR);
        $stmt->bindValue(':firstname', $firstname, \PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, \PDO::PARAM_STR);
        $stmt->bindValue(':phone', $phone, \PDO::PARAM_STR);
        $stmt->bindValue(':birthdate', $birthdate, \PDO::PARAM_STR);
        $stmt->bindValue(':passport_number', $passport_number, \PDO::PARAM_STR);
        $stmt->execute();

        return self::getPassenger($db->lastInsertId());
        
    }    

    public static function getPassenger($passenger_id) {
        $db = Database::getPdo();
        $query = 'SELECT * FROM passengers WHERE passengers.id = :passenger_id';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':passenger_id', $passenger_id);
        $stmt->execute();
        $passenger = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $passenger;

}

    //affiche les derniers passagers enregistrer, selon le nombre de passagers sélectionner dans la homepage

    public static function viewPax($nb_pax) {
        $db = Database::getPdo();
        $query = 'SELECT * FROM passengers
        ORDER BY passengers.id DESC
        LIMIT ' . $nb_pax;
        $stmt = $db->prepare($query);
        $stmt->execute();
        $view_pax= $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $view_pax;

    }

    //affiche autant de formulaire que de passagers

    public static function ftcForm($nbPax){

        for($i=0; $i<$nbPax; $i++){ ?>
        
    <div class="container">
        <div class="form-box">
            <form action= "#" method= "post">
                <div class="form-pax">
                    <label for="sexe">Sexe :</label>
                    <div class="radio-pax">
                            <input type="radio" id="homme" name="sexe" value="homme" >
                            <label for="homme">Homme</label>
                            <input type="radio" id="femme" name="sexe" value="femme" >
                            <label for="femme">Femme</label>
                    </div>
                </div>

                <div class="form-pax">
                    <label for="name">Nom :</label>
                    <input type="text" id="name" name="lastname">
                </div>
                <div class="form-pax">
                    <label for="name">Nom :</label>
                    <input type="text" id="name" name="firsttname">
                </div>

                <div class="form-pax">
                    <label for="email">E-mail :</label>
                    <input type="email" id="email" name="email">
                </div>

                <div class="form-pax">
                    <label for="phone">Téléphone :</label>
                    <input type="tel" id="phone" name="phone">
                </div>

                <div class="form-pax">
                    <label for="dateNaissance">Date de naissance :</label>
                    <input type="date" id="birthdate" name="birthdate">
                </div>

                <div class="form-pax">
                    <label for="passport_number">Numéro de passeport :</label>
                    <input type="text" id="passport_number" name="passport_number">
                </div>

                <input type="submit" value="Enregistrer">

            </form>
        </div>
    </div>

        <?php }

        
    }


}

