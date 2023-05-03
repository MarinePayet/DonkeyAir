<?php

require_once 'header.php';
require_once 'Database.php';
require_once 'Option.php';
?>

<div class="optionbox">
        <p class="text-uppercase fw-bold fs-4">Mes Options de voyage</p>
        <form method="POST" action="recapitulatif.php">

                <?php $options = Option::listOptions();

                foreach ($options as $option) : ?>

                        <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="vip_access" value="<?php echo $option['price'] ?>" name="<?php echo $option['name'] ?>">
                                <label class="form-check-label" for="vip_access" name="<?php echo $option['name'] ?>"><?php echo $option['name'] . ' ' . $option['price'] ?> €</label>
                        </div>

        <?php endforeach; ?>
                <input type="submit" value="Ajouter">
                <p></p>
                <a href="new_pax.php"> Pas d'options ? Choisissez vos passagers.</a>
        </form>

</div>