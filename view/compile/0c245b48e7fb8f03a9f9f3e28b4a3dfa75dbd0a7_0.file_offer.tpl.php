<?php
/* Smarty version 5.0.2, created on 2024-04-04 21:14:29
  from 'file:offer.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.0.2',
  'unifunc' => 'content_660efc15a7bce7_53726509',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0c245b48e7fb8f03a9f9f3e28b4a3dfa75dbd0a7' => 
    array (
      0 => 'offer.tpl',
      1 => 1712257933,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_660efc15a7bce7_53726509 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Stage-A2Prix\\view\\template';
?><!-- offer.tpl -->
<html>
  <head>
  </head>
  <div id="<?php echo $_smarty_tpl->getValue('id');?>
" class="offer-background closed">
    <div class="top-part">
      <div class="offer-left">
        <div class="offer-title">
          <h1 class="offer-h1"><?php echo $_smarty_tpl->getValue('company');?>
</h1>
          <a class="offer-sep"> - </a>
          <h2 class="offer-h2"><?php echo $_smarty_tpl->getValue('poste');?>
</h2>
        </div>
        <p class="offer-address"><?php echo $_smarty_tpl->getValue('adress');?>
</p>
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
            <p class="offer-carac-text"><?php echo $_smarty_tpl->getValue('sector');?>
</p>
          </div>
          <div class="offer-carac">
            <a class="offer-money">&nbsp</a>
            <p class="offer-carac-text"><?php echo $_smarty_tpl->getValue('money');?>
</p>
          </div>
          <div class="offer-carac">
            <a class="offer-people">&nbsp</a>
            <p class="offer-carac-text"><?php echo $_smarty_tpl->getValue('openings');?>
 ont postulé</p>
          </div>
        </div>
      </div>
    </div>
    <div class="offer-line-vertical"><div></div></div>
    <div class="bottom-part">
      <div class="bottom-left">
        <p class="offer-address"><?php echo $_smarty_tpl->getValue('description');?>
</p>
      </div>
      <div class="offer-line"><div></div></div>
      <div class="bottom-right">
        <div class="offer-carac">
          <a class="offer-time">&nbsp</a>
          <p class="offer-carac-text"><?php echo $_smarty_tpl->getValue('duration');?>
 jours</p>
        </div>
        <button class="apply">Postuler</button>
      </div>
    </div>
  </div>
</html>
<?php }
}
