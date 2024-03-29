
function GoToCreatePilot(){
    window.location.href = 'account-create-pilote.html';
}

function GoToCreateStudent(){
    window.location.href = 'account-create-student.html';
}

function GoToCreateOffer(){
    window.location.href = 'offer-creation.html';
}

function GoToOffer(){
    window.location.href = "offer-admin.html";
}

function ModifiePilot(){
    window.location.href="account-edit-pilote.html";
}

function ModifieStudent(){
    window.location.href="account-edit-student.html";
}

function ModifieEntreprise(){
    window.location.href="company-edit.html";
}

document.addEventListener('DOMContentLoaded', function() {
    var settings = document.getElementById('create-button');
    var toBlur = document.getElementById('to-blur');
    var choices = document.getElementById('create-choice');

    settings.addEventListener('click', function(event) {
        event.stopPropagation(); // Empêche le clic de se propager au document
        toBlur.style.filter = "blur(5px)";
        choices.style.display = 'flex'; // Affiche l'overlay
    });

    document.addEventListener('click', function(event) {
        // On vérifie si l'événement de clic est à l'extérieur de `choices`
        if (!choices.contains(event.target) && choices.style.display === 'flex') {
            toBlur.style.filter = "blur(0px)";
            choices.style.display = 'none'; // Cache l'overlay
        }
    });
});



document.addEventListener('DOMContentLoaded', function() {
    var settings = document.getElementById('settings');
    var toBlur = document.getElementById('to-blur');
    var choices = document.getElementById('create-choices');

    settings.addEventListener('click', function(event) {
        event.stopPropagation(); // Empêche le clic de se propager au document
        toBlur.style.filter = "blur(5px)";
        choices.style.display = 'flex'; // Affiche l'overlay
    });

    document.addEventListener('click', function(event) {
        // On vérifie si l'événement de clic est à l'extérieur de `choices`
        if (!choices.contains(event.target) && choices.style.display === 'flex') {
            toBlur.style.filter = "blur(0px)";
            choices.style.display = 'none'; // Cache l'overlay
        }
    });
});


// document.getElementById('search').addEventListener('keyup', function() {
//     var input = document.getElementById('search').value.toUpperCase();
//     var offers = document.getElementById('scroller').getElementsByClassName('offer-container');
  
//     for (var i = 0; i < offers.length; i++) {
//       var offer = offers[i];
//       if (offer.textContent.toUpperCase().indexOf(input) > -1) {
//         offer.style.display = "";
//       } else {
//         offer.style.display = "none";
//       }
//     }
//   });




