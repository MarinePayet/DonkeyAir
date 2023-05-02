'use strict';

function validateDates() {
    const departDate = document.getElementById("date-depart");
    const retourDate = document.getElementById("date-retour");

    if (departDate && retourDate) {
        const departValue = new Date(departDate.value);
        const retourValue = new Date(retourDate.value);

        if (departValue > retourValue) {
            alert("La date de départ ne peut pas être postérieure à la date de retour.");
            departDate.value = retourDate.value;
        }

        if (departValue < new Date()) {
            alert("La date de départ ne peut pas être antérieure à la date du jour.");
            departDate.value = new Date();
        }

        if (retourValue < new Date()) {
            alert("La date de retour ne peut pas être antérieure à la date du jour.");
            retourDate.value = new Date();
        }
    }
}

function validedestination() {
    const destination = document.getElementById("destination");
    if (destination) {
        if (destination.value == "") {
            alert("Veuillez choisir une destination");
        }
    }
    const depart = document.getElementById("depart");
    if (depart) {
        if (depart.value == destination.value) {
            alert("Veuillez choisir une destination différente de la ville de départ");
        }
    }
}

function fetchData(){
    let response = fetch('/myphp/saveflights.php',{
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accpert': 'application/json',
        },
        body: JSON.stringify({ query : ' { flights { id, depart, destination, date_depart, date_retour, price,} }' })
    })
    .then(response => response.json())
    .then(function(data){
        data = JSON.parse(data);
        console.log(data);
        let flights = data.data.flights;
        let table = document.getElementById("table");
        for (let i = 0; i < flights.length; i++) {
            let row = table.insertRow(i+1);
            let cell1 = row.insertCell(0);
            let cell2 = row.insertCell(1);
            cell1.innerHTML = flights[i].depart;
            cell2.innerHTML = flights[i].destination;
        }
    })
}

