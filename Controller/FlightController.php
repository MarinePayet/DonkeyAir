<?php

class FlightController 
{

    private FlightRepository $flightRepository;

    public function __construct($dbh)
    {
        $this->flightRepository = new FlightRepository($dbh);
    }

    public function list()
    {
        $flight = 'Liste des vols';

        $flights = $this->flightRepository->getFlightsToGo();


        include BASE_PATH . '/View/header.html.php';
        include BASE_PATH . '/View/flight/list.html.php';
        include BASE_PATH . '/View/footer.html.php';

    }



}