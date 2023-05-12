<?php 

class AirportRepository extends ParentRepository
{

    private AirportRepository $airportRepository;

    public function __construct($pdo)
    {
        parent::__construct($pdo, DB_TABLE_AIRPORT, Airport::class);
    }

    public function getAirportById(int $airport_id)
    {
        $airportSql = "SELECT * FROM " . DB_TABLE_AIRPORT . ' WHERE airport_id = ' . $airport_id;
        $airportStmt = $this->pdo->prepare($airportSql);

        $airportStmt->execute();
        $airportStmt->setFetchMode(PDO::FETCH_CLASS, Flight::class);

        $airport = $airportStmt->fetch();
        
        return $airport;
        var_dump($airport);
    }
        
}