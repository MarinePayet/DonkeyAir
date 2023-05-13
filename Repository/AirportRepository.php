<?php 

class AirportRepository extends ParentRepository
{

    public function __construct($pdo)
    {
        parent::__construct($pdo, DB_TABLE_AIRPORT, Airport::class);
    }
    
    // public function getAirportById(int $id)
    // {
    //     $itemSql = "SELECT * FROM " . $this->table . " WHERE id = " . $id ;
    //     $itemStmt = $this->pdo->query($itemSql);

    //     $itemStmt->setFetchMode(PDO::FETCH_CLASS, $this->tableClass);

    //     return $itemStmt->fetch();
    // }
        
}