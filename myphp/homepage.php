<?php

require_once 'header.php';
require_once 'footer.php';
require_once 'Database.php';
require_once 'verification.php';
require_once 'Airport.php';
?>

<body style="background-image: url('../myphp/pexels-nicole-avagliano-2236713.jpg');background-repeat: no-repeat;background-size: cover;">





<?php
$errors = array();
if (!empty($date_depart) && !empty($date_retour) && strtotime($date_retour) < strtotime($date_depart)) {
    $errors[] = "La date de retour doit être ultérieure à la date de départ.";
}
?>

<div class="container-lg">
    <form action="flightlist.php" method="POST">
        <label for="depart">Départ:</label>
        <select id="depart" name="depart">
            <?php Airport::listAirport() ?>;
        </select>
        <label for="destination">Destination:</label>
        <select id="destination" name="destination" >
            <?php Airport::listAirport() ?>;
        </select>
        <label for="date-depart">Date de départ :</label>
        <input type="date" id="date-depart" name="date_depart" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime('+6 months')); ?>" <?php if (isset($_POST['date_depart']) && strtotime(date('Y-m-d')) > strtotime($_POST['date_depart'])) { echo 'class="date-grisee"'; } ?> required> <br>
        <label for="date-retour">Date de retour :</label>
        <input type="date" id="date-retour" name="date_retour" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime('+6 months')); ?>" <?php if (isset($_POST['date_retour']) && strtotime(date('Y-m-d')) > strtotime($_POST['date_retour'])) { echo 'class="date-grisee"'; } ?> required> <br>   
        <label for="passagers">Passagers:</label>
        <select id="passagers" name="passagers">
            <option value="1" name="1">1 adulte, 0 enfant</option>
            <option value="2" name="2">1 adulte, 1 enfant</option>
            <option value="3" name="3">1 adulte, 2 enfants</option>
            <option value="2" name="2">2 adultes, 0 enfant</option>
            <option value="4" name="4">2 adultes, 2 enfant</option>
            <option value="5" name="5">2 adultes, 3 enfants</option>
        </select>
        <?php if (empty($errors)): ?>
            <input type="submit" value="Envoyer">
        <?php else: ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach ?>
            </ul>
        <?php endif ?>
    </form>
</div>
</body>

    
    




