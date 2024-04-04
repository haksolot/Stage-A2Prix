<html>
<div class="offer-container">
    <div id="offer-123" class="offer-background closed">
        <div class="top-part">
            <div class="offer-left">
                <div class="offer-title">
                    <h1 class="offer-h1">{$company}</h1>
                    <input class="offer-h1-input"></input>
                    <a class="offer-sep"> - </a>
                    <h2 class="offer-h2">{$poste}</h2>
                    <input class="offer-h2-input"></input>
                </div>
                <p class="offer-address">{$adress}</p>
                <input class="offer-address-input"></input>
                <div class="offer-star-holder">
                    <button data-rating="1" class="offer-star offer-starF"></button>
                    <button data-rating="2" class="offer-star offer-starF"></button>
                    <button data-rating="3" class="offer-star offer-starF"></button>
                    <button data-rating="4" class="offer-star offer-starE"></button>
                    <button data-rating="5" class="offer-star offer-starE"></button>
                </div>
            </div>
            <div class="offer-line"><div></div></div>
            <div class="offer-right">
                <div class="offer-like-container">
                    <button class="offer-like">&nbsp</button>
                </div>
                <div>
                    <div class="offer-carac">
                        <a class="offer-sector">&nbsp</a>
                        <p class="offer-carac-text">{$sector}</p>
                        <input class="offer-carac-input"></input>
                    </div>
                    <div class="offer-carac">
                        <a class="offer-money">&nbsp</a>
                        <p class="offer-carac-text">{$money}</p>
                        <input class="offer-carac-input"></input>
                    </div>
                    <div class="offer-carac">
                        <a class="offer-people">&nbsp</a>
                        <p class="offer-carac-text">{$openings} ont postulé</p>
                        <input class="offer-carac-input"></input>
                    </div>
                </div>
            </div>
        </div>
        <div class="offer-line-vertical"><div></div></div>
        <div class="bottom-part">
            <div class="bottom-left">
                <p class="offer-description">{$description}</p>
                <input class="offer-description-input"></input>
            </div>
            <div class="offer-line"><div></div></div>
            <div class="bottom-right">
                <div class="offer-carac">
                    <a class="offer-time">&nbsp</a>
                    <p class="offer-carac-text">{$duration} jours</p>
                    <input class="offer-carac-input"></input>
                </div>
            </div>
        </div>
    </div>
    <div class="actions-container">
        <button class="edit-button"></button>
        <button class="view-button"></button>
        <button class="delete-button"></button>
    </div>
</div>
</html>