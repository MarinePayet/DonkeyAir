REQUETES

SELECT name, email, password FROM bookings
LEFT JOIN users ON users.user_id = bookings.user_id;



SELECT name, email, password, flight_number as flight_go FROM bookings
LEFT JOIN users ON users.user_id = bookings.user_id
LEFT JOIN flights ON flights.flight_id = bookings.flight_go_id;


SELECT users.name, flights_go.flight_number as flight_go, flights_return.flight_number as flight_return 
FROM bookings 
LEFT JOIN users ON users.user_id = bookings.user_id 
LEFT JOIN flights as flights_go ON flights_go.flight_id = bookings.flight_go_id 
LEFT JOIN flights as flights_return ON flights_return.flight_id = bookings.flight_return_id;

-- MES RESA VOL ALLER

SELECT users.name, flights_go.flight_number as flight_go, airports.city as airport_arrival, departure_time, price
FROM bookings 
LEFT JOIN users ON users.user_id = bookings.user_id 
LEFT JOIN flights as flights_go ON flights_go.flight_id = bookings.flight_go_id
LEFT JOIN airports ON airports.airport_id = flights_go.arrival_airport_id;

-- OK INFO CARD sans prix

SELECT users.name, airports.city as airport_arrival, go_dpt_time.departure_time as go_dpt_time, return_dpt_time.departure_time as return_dpt_time
FROM bookings 
LEFT JOIN users ON users.user_id = bookings.user_id 
LEFT JOIN flights as go_dpt_time ON go_dpt_time.flight_id = bookings.flight_go_id
LEFT JOIN flights as return_dpt_time ON return_dpt_time.flight_id = bookings.flight_return_id
LEFT JOIN airports ON airports.airport_id = go_dpt_time.arrival_airport_id;

-- OK INFO CARD avec prix

SELECT users.user_id, airports.city as airport_arrival, go_dpt_time.departure_time as go_dpt_time,go_dpt_time.date as go_date, return_dpt_time.departure_time as return_dpt_time, return_dpt_time.date as return_date, go_dpt_time.price as go_price, return_dpt_time.price as return_price
FROM bookings 
LEFT JOIN users ON users.user_id = bookings.user_id 
LEFT JOIN flights as go_dpt_time ON go_dpt_time.flight_id = bookings.flight_go_id
LEFT JOIN flights as return_dpt_time ON return_dpt_time.flight_id = bookings.flight_return_id
LEFT JOIN airports ON airports.airport_id = go_dpt_time.arrival_airport_id
WHERE users.user_id = 3
ORDER BY go_date DESC;



-- MES RESA VOL RETOUR
SELECT users.name, flights_go.flight_number as flight_go, airports.city as airport_arrival, flights_return.flight_number as flight_return, airports.city as airport_arrival
FROM bookings 
LEFT JOIN users ON users.user_id = bookings.user_id 
LEFT JOIN flights as flights_return ON flights_return.flight_id = bookings.flight_return_id
LEFT JOIN flights as flights_go ON flights_go.flight_id = bookings.flight_go_id
LEFT JOIN airports ON airports.airport_id = flights_go.arrival_airport_id
LEFT JOIN airports as airport_arrival ON airports.airport_id = flights_return.arrival_airport_id;

--MES RESA ALLER ET RETOUR
SELECT users.name, flights_return.flight_number as flight_return, airports.city as airport_arrival, arrival_time, price
FROM bookings 
LEFT JOIN users ON users.user_id = bookings.user_id 
LEFT JOIN flights as flights_return ON flights_return.flight_id = bookings.flight_return_id
LEFT JOIN airports ON airports.airport_id = flights_return.arrival_airport_id;

SELECT users.name, flights_return.flight_number as flight_return, airports.name as airport_return
FROM bookings 
LEFT JOIN users ON users.user_id = bookings.user_id 
LEFT JOIN flights as flights_return ON flights_return.flight_id = bookings.flight_return_id
LEFT JOIN airports ON airports.airport_id = flights_return.arrival_airport_id;


SELECT users.name, flights_go.flight_number as flight_go, flights_return.flight_number as flight_return, airport_go.name as airport_go, airport_return.name as airport_return
FROM bookings 
LEFT JOIN users ON users.user_id = bookings.user_id 
LEFT JOIN flights as flights_go ON flights_go.flight_id = bookings.flight_go_id 
LEFT JOIN flights as flights_return ON flights_return.flight_id = bookings.flight_return_id
LEFT JOIN airports as airport_go ON airport_go.airport_id = flights_go.departure_airport_id
LEFT JOIN airports as airport_return ON airport_return.airport_id = flights_return.arrival_airport_id;


SELECT users.name, flights_go.flight_number as flight_go, flights.departure_time, flights_return.flight_number as flight_return, airport_go.name as airport_go, airport_return.name as airport_return, flights.price
        FROM bookings 
        LEFT JOIN users ON users.user_id = bookings.user_id 
        LEFT JOIN flights as flights_go ON flights_go.flight_id = bookings.flight_go_id 
        LEFT JOIN flights as flights_return ON flights_return.flight_id = bookings.flight_return_id
        LEFT JOIN flights ON flights.price = bookings.flight_go_id
        LEFT JOIN airports as airport_go ON airport_go.airport_id = flights_go.departure_airport_id
        LEFT JOIN airports as airport_return ON airport_return.airport_id = flights_return.departure_airport_id;




SELECT *, city FROM flights 
LEFT JOIN airports ON airports.airport_id = flights.arrival_airport_id
WHERE arrival_airport_id = 3;




