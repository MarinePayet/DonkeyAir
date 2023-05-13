<?php

class Flight 
{
    private int $id;
    private int $flight_number;
    private int $departure_airport_id;
    private string $departure_time;
    private int $arrival_airport_id;
    private string $arrival_time;
    private int $price;
    private int $available_seats;
    private int $capacity;
    private string $date;
    private Airport $airportGo;
    private Airport $airportArrival;

    


    public function getId(){
        return $this->id;
    }

    public function getFlightNumber(){
        return $this->flight_number;
    }
    public function setFlightNumber($flight_number){
        $this->flight_number = $flight_number;
    }
    
    public function getDepartureAirportId(){
        return $this->departure_airport_id;
    }
    public function setDepartureAirportId($departure_airport_id){
        $this->departure_airport_id = $departure_airport_id;
    }
    
    public function getDepartureTime(){
        return $this->departure_time;
    }
    public function setDepartureTime($departure_time){
        $this->departure_time = $departure_time;
    }
    
    public function getArrivalAirportId(){
        return $this->arrival_airport_id;
    }
    public function setArrivalAirportId($arrival_airport_id){
        $this->arrival_airport_id = $arrival_airport_id;
    }
    
    public function getArrivalTime(){
        return $this->arrival_time;
    }
    public function setArrivalTime($arrival_time){
        $this->arrival_time = $arrival_time;
    }
    
    public function getPrice(){
        return $this->price;
    }
    public function setPrice($price){
        $this->price = $price;
    }
    
    public function getAvailableSeats(){
        return $this->available_seats;
    }
    public function setAvailableSeats($available_seats){
        $this->available_seats = $available_seats;
    }
    
    public function getCapacity(){
        return $this->capacity;
    }
    public function setCapaity($capacity){
        $this->capacity = $capacity;
    }
    
    public function getDate(){
        return $this->date;
    }
    public function setDate($date){
        $this->date = $date;
    }
    
    public function getAirportGo(){
        return $this->airportGo;
    }
    public function setAirportGO(Airport $airportGo){
        $this->airportGo = $airportGo;
    }
    
    public function getAirportArrival(){
        return $this->airportArrival;
    }
    public function setAirportArrival(Airport $airportArrival){
        $this->airportArrival = $airportArrival;
    }
    

}