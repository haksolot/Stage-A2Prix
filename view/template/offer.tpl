<!-- offer.tpl -->
<html>
  <head>
    <link rel="stylesheet" href="../style/offer.css"/>
  </head>
  <div id="offer" class="offer-background closed">
    <div class="top-part">
      <div class="offer-left">
        <div class="offer-title">
          <h1 class="offer-h1">{$company}</h1>
          <a class="offer-sep"> - </a>
          <h2 class="offer-h2">{$poste}</h2>
        </div>
        <p class="offer-address">{$adress}</p>
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
          </div>
          <div class="offer-carac">
            <a class="offer-money">&nbsp</a>
            <p class="offer-carac-text">{$money}</p>
          </div>
          <div class="offer-carac">
            <a class="offer-people">&nbsp</a>
            <p class="offer-carac-text">{$openings} ont postulé</p>
          </div>
        </div>
      </div>
    </div>
    <div class="offer-line-vertical"><div></div></div>
    <div class="bottom-part">
      <div class="bottom-left">
        <p class="offer-address">{$description}</p>
      </div>
      <div class="offer-line"><div></div></div>
      <div class="bottom-right">
        <div class="offer-carac">
          <a class="offer-time">&nbsp</a>
          <p class="offer-carac-text">{$duration} jours</p>
        </div>
        <button class="apply">Postuler</button>
      </div>
    </div>
  </div>
</html>
