<table class="table table-stripped container-sm">
    <tr>
        <th>ID</th>
        <th>Flight Number</th>
        <th>Departure airport ID</th>
        <th>departure Time</th>
        <th>Arrival airport ID</th>
        <th>Arrival Time</th>
        <th>price</th>
        <th>available seats</th>
        <th>date</th>
        <th>airport</th>
    </tr>

    <?php 
        foreach($flights as $flight){
            echo '<tr>';
                echo '<td>' . $flight->getId() . '</td>';
                echo '<td>' . $flight->getFlightNumber() . '</td>';
                echo '<td>' . $flight->getDepartureAirportId() . '</td>';
                echo '<td>' . $flight->getDepartureTime() . '</td>';
                echo '<td>' . $flight->getArrivalAirportId() . '</td>';
                echo '<td>' . $flight->getArrivalTime() . '</td>';
                echo '<td>' . $flight->getPrice() . '</td>';
                echo '<td>' . $flight->getAvailableSeats() . '</td>';
                echo '<td>' . $flight->getDate() . '</td>';
                echo '<td>' . $flight->getAirportbyId() . '</td>';




            echo '</tr>';
        }




    ?>  




</table>