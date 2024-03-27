
function GoToCreatePilot(){
    window.location.href = 'account-create-pilote.php';
}

function GoToCreateStudent(){
    window.location.href = 'account-create-student.php';
}

function GoToCreateOffer(){
    window.location;href = 'offer-creation.php';
}

document.addEventListener('DOMContentLoaded', function() {
    var createButton = document.getElementById('create-button');
    var toBlur = document.getElementById('to-blur');
    var choice = document.getElementById('create-choice');

    createButton.addEventListener('click', function() {
        toBlur.style.filter = "blur(5px)";
        choice.style.display = 'flex'; // Affiche l'overlay
    });

});

document.addEventListener('click', function(event) {
    var createButton = document.getElementById('create-button');
    var toBlur = document.getElementById('to-blur');
    var choice = document.getElementById('create-choice');

    if(event.target != createButton){
        toBlur.style.filter = "blur(0px)";
        choice.style.display = 'none';
    }
    else{

    } 
});


