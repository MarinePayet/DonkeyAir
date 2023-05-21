<?php
require_once 'header.php';
require_once 'footer.php';
require_once 'Database.php';
require_once 'Passenger.php';
require_once 'Flight.php';


if (empty($_POST['email']['0'])) {
    header('Location: new_pax.php');
}

?>

<div class="div-recap">
    <div class="div-recap-dedans">
        <h5>🛫 Vol Aller</h5>
        <div class="h5-date">
            <h5><?php echo date('d-m-Y', strtotime($_SESSION['go_date'])); ?></h5>
        </div>
        <div class="div-recap div-info">
            <div>
                <?php
                if (isset($_SESSION['go_id'])) {
                    $flights = Flight::queryRecapGo($_SESSION['go_id']);

                    foreach ($flights as $flight) : ?>
                        <p><?php echo $flight['departure_time'] ?> </p>
                        <p><?php echo $flight['go_airport'] ?> </p>
            </div>
            <div>
                <h1>✈️</h1>
            </div>
            <div>
                <p><?php echo $flight['arrival_time'] ?> </p>
                <p><?php echo $flight['arrival_airport'] ?> </p>

            </div>
        </div>
        <div class="div-info-vol">
            <p>Numero de vol : <?php echo $flight['flight_number'] ?></p>
        </div>
        <div class="div-recap">
            <div>
                <p>Tarifs : <?php echo $flight['price'] ?> €</p>
            </div>
        </div </div>
    </div>
<?php
                    endforeach;
                }
?>

<div class="div-recap-dedans">
    <h5>🛬 Vol Retour</h5>
    <div class="h5-date">
        <h5><?php echo date('d-m-Y', strtotime($_SESSION['return_date'])); ?></h5>
    </div>
    <div class="div-recap div-info">
        <div>
            <?php
            if (isset($_SESSION['return_id'])) {

                $flights = Flight::queryRecapReturn($_SESSION['return_id']);

                foreach ($flights as $flight) : ?>
                    <p><?php echo $flight['departure_time'] ?> </p>
                    <p><?php echo $flight['return_airport'] ?> </p>
        </div>
        <div>
            <h1>✈️</h1>
        </div>
        <div>
            <p><?php echo $flight['arrival_time'] ?> </p>
            <p><?php echo $flight['arrival_airport'] ?> </p>
        </div>
    </div>
    <div class="div-info-vol">
        <p>Numero de vol : <?php echo $flight['flight_number'] ?></p>
    </div>
    <div class="div-recap">
        <div>
            <p>Tarifs : <?php echo $flight['price'] ?> €</p>
        </div>

    </div>
</div>
</div>
<?php
                endforeach;
            }


            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nb_pax = $_SESSION['nb_pax'];
                $passengers = [];

                for ($i = 0; $i < $nb_pax; $i++) {
                    $lastname = $_POST['lastname'][$i];
                    $firstname = $_POST['firstname'][$i];
                    $email = $_POST['email'][$i];
                    $phone = $_POST['phone'][$i];
                    $birthdate = $_POST['birthdate'][$i];
                    $passport_number = $_POST['passport_number'][$i];

                    $passenger = Passenger::createPassenger($lastname, $firstname, $email, $phone, $birthdate, $passport_number);
                    $passengers[] = $passenger;
                }

                $_SESSION['passengers'] = $passengers;
            }

?>

</br>

<div class="container-xl">


    <p><?php echo "Nombre de voyageur : " . $_SESSION['nb_pax'] ?></p><?php
        $paxpax = Passenger::viewPax($_SESSION['nb_pax']);
        for ($i = 0; $i < $_SESSION['nb_pax']; $i++) {
            $pax = $paxpax[$i];
        ?>


        <div class="card border-dark mb-3" style="max-width: 18rem;">
            <div class="card-header">Passager <?php echo $i + 1; ?></div>
            <div class="card-body">

                <h5 class="card-title">Informations du passager</h5>
                <p class="card-text">Nom: <?php echo $pax['lastname']; ?></p>
                <p class="card-text">Prénom: <?php echo $pax['firstname']; ?></p>
                <p class="card-text">Email: <?php echo $pax['email']; ?></p>
                <p class="card-text">Téléphone: <?php echo $pax['phone']; ?></p>
                <p class="card-text">Date de naissance: <?php echo $pax['birthdate']; ?></p>
                <p class="card-text">Numéro de passeport: <?php echo $pax['passport_number']; ?></p>


            </div>
        </div>
    <?php

                }

    ?>
</div>

</br>
<form action="bookings.php" method="POST">
    <div class="div-recap">
        <div class="div-recap-dedans-total">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="téléchargement.jpeg" class="img-fluid rounded-start" alt="option">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">

                            <?php
                            $totalOptions = 0;

                            foreach ($_SESSION['options'] as $k => $v) {

                                $totalOptions += $v; ?>

                                <p><?php $k . "<br>"; ?></p>
                            <?php
                                $newk = str_replace('_', ' ', $k);
                                echo $newk;
                            }
                            $_SESSION['total_option_price'] = $totalOptions;

                            echo "<br><br> Prix total des options : " . $_SESSION['total_option_price'] . "€"; ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card text-center mb-3" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">TOTAL DE VOTRE VOYAGE</h5>
                    <p class="card-text "> <?php echo  $_SESSION['total_price'] * $_SESSION['nb_pax'] + $totalOptions . ' €' ?>
                </div>.</p>
                <a href="bookings.php" id="pay" onchange="pay()" class="btn btn-primary">paiement</a>
            </div>
        </div>



</form>
</div>