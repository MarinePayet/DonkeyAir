<?php

require_once 'header.php';
require_once 'Database.php';
?>

<div class="optionbox">
        <p class="text-uppercase fw-bold fs-4">Mes Options de voyage</p>
        <form method="POST" action="recapitulatif.php">
                <?php $db = DataBase::getPdo();
                $options = $db->query('SELECT * FROM options'); ?>
                <p>choisir un menu</p>
                <?php
                foreach ($options as $option) :
                ?>
                        <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="vip_access" value="<?php echo $option['price'] ?>" name="<?php echo $option['name'] ?>">
                                <label class="form-check-label" for="vip_access" name="<?php echo $option['name'] ?>"><?php echo $option['name'] . ' ' . $option['price'] ?> €</label>
                        </div>


                <?php endforeach; ?>
                <!-- <div style="border-style:solid; width:400px; padding:20px">
        <p>choisir un menu</p>
        <div class="form-check">
                <input type="checkbox" class="form-check-input" value="20" name="Végétarien">
                <label class="form-check-label"  name="Végétarien"> Végétarien - 20 €</label>
        </div>
        <div class="form-check">
                <input type="checkbox" class="form-check-input" value="20" name="Halal">
                <label class="form-check-label"  name="Halal"> Halal - 20 €</label>
        </div>
        <div class="form-check">
        <input type="checkbox" class="form-check-input" value="20" name="Casher">
        <label class="form-check-label"  name="Casher"> Casher - 20 €</label>
        </div>
        </div>
        <br>
        <div style="border-style:solid; width:400px; padding:20px">
        <p>choisir un siège </p>
        <div class="form-check">
        <input type="checkbox" class="form-check-input" value="150" name="Siège Premium">
        <label class="form-check-label"  name="Siège Premium"> Siège Premium - 150 €</label>
        </div>
        <div class="form-check">
        
        <input type="checkbox" class="form-check-input" value="50" name="Sortie de secours">
        <label class="form-check-label"  name="Sortie de secours"> Sortie de secours - 50 €</label>
        </div>
        
        </div>
	
		<br>
        <div style="border-style:solid; width:400px; padding:20px">
        <p>choisir une assistance </p>
        <div class="form-check">
        <input type="checkbox" class="form-check-input" value="100" name="Vip Mode">
        <label class="form-check-label" name="Vip Mode"> Accès VIP - 100 €</label>
        </div>
        <div class="form-check">
        <input type="checkbox" class="form-check-input"  value="50" name="Mineur non accompagné">
        <label class="form-check-label" name="Mineur non accompagné"> Mineur non accompagné - 50 €</label>
        </div>
        <div class="form-check">
                <input type="checkbox" class="form-check-input"  value="0" name="Chaise roulante">
        <label class="form-check-label" name="Chaise roulante"> Chaise roulante </label>
        </div>
        div class="form-check">
        <input type="checkbox" class="form-check-input"  value="0" name="Mal Entendant">
        <label class="form-check-label" name="Mal Entendant"> Mal Entendant</label>
        </div>
        <div class="form-check">
                <input type="checkbox" class="form-check-input"  value="0" name="Mal Voyant">
        <label class="form-check-label" name="Mal Voyant"> Mal Voyant</label>
        </div>
        
        
        </div> -->

                <input type="submit" value="Ajouter">
        </form>

</div>