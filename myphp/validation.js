




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
function calculatePrice() {
    var selectElement = document.getElementById('flight-select');
    var flightId = selectElement.options[selectElement.selectedIndex].value;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'savelist.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var totalPrice = xhr.responseText;
                document.getElementById('total-price').innerHTML = 'Le prix total est de ' + totalPrice;
            } else {
                alert('Une erreur est survenue');
            }
        }
    };
    xhr.send('flight_id=' + flightId);
}

// const goFormRefresh = document.getElementById("go_form");

// goFormRefresh.addEventListener("submit", (e) => {
//     e.preventDefault();

//     console.log(e);
// });




// form.addEventListener("submit", (e) => {
//     e.preventDefault();
//     if (pseudo && email && password && confirmPass) {
//         const data = {
//         pseudo,
//         email,
//         password,
//         };
//         console.log(data);
//         inputs.forEach((input) => (input.value = ""));
//         progressBar.classList = "";
//         pseudo = null;
//         email = null;
//         password = null;
//         confirmPass = null;
//         alert("Inscription validée !");
//     } else {
//         alert("veuillez remplir correctement les champs");
//     }
//     });








