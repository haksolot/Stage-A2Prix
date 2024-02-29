


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
