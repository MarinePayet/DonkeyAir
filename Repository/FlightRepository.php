<?php

class FlightRepository extends ParentRepository
{

    private AirportRepository $airportRepository;


    public function __construct($pdo)
    {
        parent::__construct($pdo, DB_TABLE_FLIGHTS, Flight::class);

        $this->airportRepository = new AirportRepository($pdo);
    }

    public function getFlightsToGo(array $filters=[])
    {
        $flightSql = "SELECT * FROM " . DB_TABLE_FLIGHTS . ' f ';
        $flightStmt = $this->pdo->prepare($flightSql);

        $flightStmt->execute();
        $flightStmt->setFetchMode(PDO::FETCH_CLASS, Flight::class);

        $flights = $flightStmt->fetchAll();
        
        foreach($flights as $flight){
            $airportGo = $this->airportRepository->getItemById($flight->getDepartureAirportId());
            $airportArrival = $this->airportRepository->getItemById($flight->getArrivalAirportId());

            $flight->setAirportGo($airportGo);
            $flight->setAirportArrival($airportArrival);
        }
        
        return $flights;
    }


}