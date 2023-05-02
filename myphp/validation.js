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


function fetchData(type, flightId){
    fetch('/saveflights.php?type='+type+'&flightId='+flightId)
    .then(response => response.json())
    .then(function(data){
        console.log(data);
        location.reload();
        if(data.status == 'success'){
            alert('Le vol a été ajouté à vos favoris');
        }else{
            alert('Le vol a été retiré de vos favoris');
        }
    
})








}




// document.querySelectorAll(“#go_form”).addEventListener(‘submit’, function(event) {
//     event.preventDefault();
//     const form_data = new FormData(document.querySelectorAll(“#go_form”));
//     console.log(form_data);
//     fetch(“saveflights.php”, {
//       method: “POST”,
//       body: form_data
//     }).then(function(response) {
//       return response.text();
//     }).then(function(data) {
//       document.querySelector(“#result”).innerHTML = data;
//     });
//   });


