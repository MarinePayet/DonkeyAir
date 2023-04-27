<?php
require_once 'Database.php';


Class Airport 
{

    public static function listAirport(){ 

    
        $db = Database::getPdo();
        $airports = $db->query('SELECT * FROM airports');

        foreach ($airports as $airport): 
        
        ?>
            <option name="airport_id" value="<?php $airport['airport_id'] ?>"> <?php echo $airport['city']; ?> </option>  
        <?php endforeach; 
    }



}

