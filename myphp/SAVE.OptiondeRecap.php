
<form action="bookings.php" method="POST">
</br>
<div class="div-recap">
    <div class="div-recap-dedans">
        <div class="div-info-vol">
            <h5>Options </h5>
        </div>
        
        <?php 
        $totalOptions = 0;
        
        foreach($_POST as $k => $v) { 
            
            $totalOptions += $v; ?>

            <p><?php $k . "<br>";?></p>
            <?php 
            $newk = str_replace('_', ' ', $k);
            echo $newk ; 
            }

        echo "<br><br> Prix total des options : " . $totalOptions . "€"; ?>

    </div>
</div>
<div class="div-recap">
    <div class="div-recap-dedans">
        <?php echo "Total de votre voyage : " . $_SESSION['total_price']*$_SESSION['nb_pax'] + $totalOptions . ' €' ?>
    </div>
</div>
<button type="submit" class="btn btn-primary">Choisir</button></td>
</form>