


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

document.addEventListener('DOMContentLoaded', function() {
    // Ajoutez un gestionnaire d'événements de clic à chaque bouton "Modifier"
    var editButtons = document.querySelectorAll('.edit-button');
    
    // Définissez une classe pour le mode édition
    var editModeClass = 'edit-mode';

    // Ajoutez un gestionnaire d'événements de clic à chaque bouton "Modifier"
    editButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            // Vérifiez si le bouton est en mode édition
            var isInEditMode = button.classList.contains(editModeClass);

            // Récupérez les éléments à modifier
            var title = button.closest('.offer-container').querySelector('.offer-title');
            var h1Title = button.closest('.offer-container').querySelector('.offer-h1');
            var h2Title = button.closest('.offer-container').querySelector('.offer-h2');
            var address = button.closest('.offer-container').querySelector('.offer-address');
            var description = button.closest('.offer-container').querySelector('.offer-description');
            var caracElements = button.closest('.offer-container').querySelectorAll('.offer-carac p');

            if (!isInEditMode) {
                // Cacher les éléments d'affichage
                h1Title.style.display = 'none';
                h2Title.style.display = 'none';
                address.style.display = 'none';
                description.style.display = 'none';
                caracElements.forEach(function(caracElement) {
                    caracElement.style.display = 'none';
                });

                document.querySelector('.offer-star-holder').style.display = 'none';
                document.querySelector('.offer-like-container').style.display = 'none';
                document.querySelector('.offer-sector').style.display = 'none';
                document.querySelector('.offer-money').style.display = 'none';
                document.querySelector('.offer-people').style.display = 'none';
                document.querySelector('.offer-line-vertical').style.display = 'none';
                document.querySelector('.offer-time').style.display = 'none';
    
                // Afficher les champs d'entrée correspondants
                var titleH1Input = title.querySelector('.offer-h1-input');
                var titleH2Input = title.querySelector('.offer-h2-input');
                var addressInput = button.closest('.offer-container').querySelector('.offer-address-input');
                var descriptionInput = button.closest('.offer-container').querySelector('.offer-description-input');
                var caracInputs = button.closest('.offer-container').querySelectorAll('.offer-carac-input');
                
                titleH1Input.value = h1Title.textContent;
                titleH2Input.value = h2Title.textContent;
                addressInput.value = address.textContent;
                descriptionInput.value = description.textContent;
                caracInputs.forEach(function(caracInput, index) {
                    caracInput.value = caracElements[index].textContent;
                });
                

                titleH1Input.style.display = 'block';
                titleH2Input.style.display = 'block';
                addressInput.style.display = 'block';
                descriptionInput.style.display = 'block';
                caracInputs.forEach(function(caracInput) {
                    caracInput.style.display = 'block';
                });

                // Ajoutez la classe pour le mode édition
                button.classList.add(editModeClass);
                button.classList.replace('editing-state', 'confirmation-state');
            } else {
                var titleH1Input = title.querySelector('.offer-h1-input');
                var titleH2Input = title.querySelector('.offer-h2-input');
                var addressInput = button.closest('.offer-container').querySelector('.offer-address-input');
                var descriptionInput = button.closest('.offer-container').querySelector('.offer-description-input');
                var caracInputs = button.closest('.offer-container').querySelectorAll('.offer-carac-input');
                // Afficher à nouveau les éléments d'affichage et masquer les champs d'entrée

                h1Title.textContent = titleH1Input.value;
                h2Title.textContent = titleH2Input.value;
                address.textContent =   addressInput.value;
                description.textContent = descriptionInput.value;
                caracElements.forEach(function(caracElement, index) {
                    caracElement.textContent = caracInputs[index].value;
                });

                h1Title.style.display = 'block';
                h2Title.style.display = 'block';
                address.style.display = 'block';
                description.style.display = 'block';
                caracElements.forEach(function(caracElement) {
                    caracElement.style.display = 'block';
                });

                var titleH1Input = title.querySelector('.offer-h1-input');
                var titleH2Input = title.querySelector('.offer-h2-input');
                var addressInput = button.closest('.offer-container').querySelector('.offer-address-input');
                var descriptionInput = button.closest('.offer-container').querySelector('.offer-description-input');
                var caracInputs = button.closest('.offer-container').querySelectorAll('.offer-carac-input');

                titleH1Input.style.display = 'none';
                titleH2Input.style.display = 'none';
                addressInput.style.display = 'none';
                descriptionInput.style.display = 'none';
                caracInputs.forEach(function(caracInput) {
                    caracInput.style.display = 'none';
                });


                // Retirez la classe pour le mode édition
                button.classList.remove(editModeClass);
                button.classList.replace('confirmation-state', 'editing-state');
            }
        });
    });
});
