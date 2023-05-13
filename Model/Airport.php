<?php

class Airport 
{
    private int $id;
    private string $name;
    private string $city;
    private string $country;


    public function getAirportId(){
        return $this->id;
    }
    
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        return $this->name = $name;
    }
    
    public function getCity(){
        return $this->city;
    }
    public function setCity($city){
        return $this->city = $city;
    }
    
    public function getCountry(){
        return $this->country;
    }
    public function setCountry($country){
        return $this->country = $country;
    }





}