


// Ouverture et fermeture des offres
document.addEventListener('DOMContentLoaded', function() {
    var elements = document.querySelectorAll('.offer-background');
    elements.forEach(function(element) {
        element.addEventListener('click', function(event) {
            // Vérifier si l'élément déclencheur de l'événement est l'élément parent lui-même
            if (event.target === element) {
                if (element.classList.contains('closed')) {
                    element.classList.replace('closed', 'opened');
                } else {
                    element.classList.replace('opened', 'closed');
                }
            }
        });
    });
});

// Redirection à la page pour postuler
document.addEventListener('DOMContentLoaded', function() {
    var elements = document.querySelectorAll('.apply');
    elements.forEach(function(element) {
        element.addEventListener('click', function() {
            window.location.href = 'apply.html';
        });
    });
});

// Changement de couleur pour l'icone wishlist
document.addEventListener('DOMContentLoaded', function() {
    var elements = document.querySelectorAll('.offer-like');
    elements.forEach(function(element) {
        element.addEventListener('click', function() {
            if (element.classList.contains('offer-like')) {
                element.classList.replace('offer-like', 'offer-like-red');
            } else {
                element.classList.replace('offer-like-red', 'offer-like');
            }
        });
    });
});

// Changement d'état pour les étoiles
document.addEventListener('DOMContentLoaded', function() {
    var ratings = document.querySelectorAll('.offer-star-holder');

    ratings.forEach(function(rating) {
        var stars = rating.querySelectorAll('.offer-star');
        stars.forEach(function(star) {
            star.addEventListener('click', function() {
                var ratingValue = parseInt(star.getAttribute('data-rating'));
                setActiveStars(rating, ratingValue);
            });
        });
    });

    function setActiveStars(rating, ratingValue) {
        var stars = rating.querySelectorAll('.offer-star');
        stars.forEach(function(star) {
            var starRating = parseInt(star.getAttribute('data-rating'));
            if (starRating <= ratingValue) {
                star.classList.replace('offer-starE', 'offer-starF');
            } else {
                star.classList.replace('offer-starF', 'offer-starE');
            }
        });
    }
});

// Transformation des info en champs remplissable

// document.addEventListener('DOMContentLoaded', function() {
//     // Sélectionnez tous les boutons "Modifier"
//     var editButtons = document.querySelectorAll('.edit-button');

//     // Ajoutez un gestionnaire d'événements de clic à chaque bouton "Modifier"
//     editButtons.forEach(function(button) {
//         button.addEventListener('click', function() {
//             // Récupérez les éléments à modifier
//             var title = button.closest('.offer-container').querySelector('.offer-title');
//             var address = button.closest('.offer-container').querySelector('.offer-address');
//             var description = button.closest('.offer-container').querySelector('.bottom-left p');

//             // Remplacez les éléments par des champs de saisie
//             var titleInput = document.createElement('input');
//             titleInput.value = title.querySelector('.offer-h1').textContent + ' - ' + title.querySelector('.offer-h2').textContent;
//             title.replaceWith(titleInput);

//             var addressInput = document.createElement('input');
//             addressInput.value = address.textContent;
//             address.replaceWith(addressInput);

//             var descriptionInput = document.createElement('textarea');
//             descriptionInput.value = description.textContent;
//             description.replaceWith(descriptionInput);

//             // Ajoutez un bouton "Enregistrer" pour enregistrer les modifications
//             var saveButton = document.createElement('button');
//             saveButton.textContent = 'Enregistrer';
//             button.after(saveButton);

//             // Ajoutez un gestionnaire d'événements de clic au bouton "Enregistrer"
//             saveButton.addEventListener('click', function() {
//                 // Mettez à jour les éléments d'origine avec les nouvelles valeurs
//                 title.innerHTML = '<h1 class="offer-h1">' + titleInput.value.split(' - ')[0] + '</h1><a class="offer-sep"> - </a><h2 class="offer-h2">' + titleInput.value.split(' - ')[1] + '</h2>';
//                 address.textContent = addressInput.value;
//                 description.innerHTML = descriptionInput.value;

//                 // Supprimez les champs de saisie et le bouton "Enregistrer"
//                 titleInput.replaceWith(title);
//                 addressInput.replaceWith(address);
//                 descriptionInput.replaceWith(description);
//                 saveButton.remove();
//             });
//         });
//     });
// });

document.addEventListener('DOMContentLoaded', function() {
    // Sélectionnez tous les boutons "Modifier"
    var editButtons = document.querySelectorAll('.edit-button');

    // Ajoutez un gestionnaire d'événements de clic à chaque bouton "Modifier"
    editButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            // Récupérez les éléments à modifier
            var title = button.closest('.offer-container').querySelector('.offer-title');
            var address = button.closest('.offer-container').querySelector('.offer-address');
            var description = button.closest('.offer-container').querySelector('.bottom-left p');
            var caracElements = button.closest('.offer-container').querySelectorAll('.offer-carac p');

            // Remplacez les éléments par des champs de saisie
            var titleInput = document.createElement('input');
            titleInput.value = title.querySelector('.offer-h1').textContent + ' - ' + title.querySelector('.offer-h2').textContent;
            title.replaceWith(titleInput);

            var addressInput = document.createElement('input');
            addressInput.value = address.textContent;
            address.replaceWith(addressInput);

            var descriptionInput = document.createElement('textarea');
            descriptionInput.value = description.textContent;
            description.replaceWith(descriptionInput);

            var caracInputs = [];
            caracElements.forEach(function(caracElement) {
                var input = document.createElement('input');
                input.value = caracElement.textContent;
                caracElement.replaceWith(input);
                caracInputs.push(input);
            });

            // Ajoutez un bouton "Enregistrer" pour enregistrer les modifications
            var saveButton = document.createElement('button');
            saveButton.textContent = 'Enregistrer';
            button.after(saveButton);

            // Ajoutez un gestionnaire d'événements de clic au bouton "Enregistrer"
            saveButton.addEventListener('click', function() {
                // Mettez à jour les éléments d'origine avec les nouvelles valeurs
                title.innerHTML = '<h1 class="offer-h1">' + titleInput.value.split(' - ')[0] + '</h1><a class="offer-sep"> - </a><h2 class="offer-h2">' + titleInput.value.split(' - ')[1] + '</h2>';
                address.textContent = addressInput.value;
                description.innerHTML = descriptionInput.value;

                caracElements.forEach(function(caracElement, index) {
                    caracElement.textContent = caracInputs[index].value;
                });

                // Supprimez les champs de saisie et le bouton "Enregistrer"
                titleInput.replaceWith(title);
                addressInput.replaceWith(address);
                descriptionInput.replaceWith(description);
                caracInputs.forEach(function(input, index) {
                    input.replaceWith(caracElements[index]);
                });
                saveButton.remove();
            });
        });
    });
});

