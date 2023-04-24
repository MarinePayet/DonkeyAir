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