
function GoToCreatePilot(){
    window.location.href = 'account-create-pilote.php';
}

function GoToCreateStudent(){
    window.location.href = 'account-create-student.php';
}

function GoToCreateOffer(){
    window.location.href = 'offer-creation.php';
}

function GoToOffer(){
    window.location.href = "offer.php";
}

function ModifiePilot(){
    window.location.href="account-edit-pilote.php";
}

function ModifieStudent(){
    window.location.href="account-edit-student.php";
}

function ModifieEntreprise(){
    window.location.href="company-edit.php";
}

function ModifieStage(){
    window.location.href="offer-edit.php"
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