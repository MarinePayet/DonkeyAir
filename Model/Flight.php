<?php

class Flight 
{
    private int $flight_id;
    private int $flight_number;
    private int $departure_airport_id;
    private string $departure_time;
    private int $arrival_airport_id;
    private string $arrival_time;
    private int $price;
    private int $available_seats;
    private int $capacity;
    private string $date;
    private Airport $airport;
    


    public function getId(){
        return $this->flight_id;
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
    
    public function getAirport(){
        return $this->airport;
    }
    public function setAirport(Airport $airport){
        $this->airport = $airport;
    }
    // public function getAirportId(){
    //     return $this->airport_id;
    // }
    // public function setAirportId(Airport $airport){
    //     $this->airport_id = $airport_id;
    // }
    

}