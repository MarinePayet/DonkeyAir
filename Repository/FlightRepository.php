<?php

class FlightRepository extends ParentRepository
{

    private AirportRepository $airportRepository;


    public function __construct($pdo)
    {
        parent::__construct($pdo, DB_TABLE_FLIGHTS, Flight::class);

        $this->airportRepository = new AirportRepository($pdo);
    }

    public function getFlights(array $filters=[])
    {
        $flightSql = "SELECT * FROM " . DB_TABLE_FLIGHTS . ' f ';
        $flightStmt = $this->pdo->prepare($flightSql);

        $flightStmt->execute();
        $flightStmt->setFetchMode(PDO::FETCH_CLASS, Flight::class);

        $flights = $flightStmt->fetchAll();
        
        foreach($flights as $flight){
            $airport = $this->airportRepository->getAirportById($flight->getDepartureAirportId());

            $flight->setAirport($airport);
        }
        
        return $flights;
    }




}