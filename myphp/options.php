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
		foreach ($options as $option): 
		?>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="vip_access" value="<?php echo $option['price'] ?>" name="<?php echo $option['name']?>">
                <label class="form-check-label" for="vip_access" name="<?php echo $option['name']?>"><?php echo $option['name'] . ' ' . $option['price'] ?> €</label>
        </div>
            

    <?php endforeach; ?>
        
	
	<input type="submit" value="Ajouter">
</form>

</div>
