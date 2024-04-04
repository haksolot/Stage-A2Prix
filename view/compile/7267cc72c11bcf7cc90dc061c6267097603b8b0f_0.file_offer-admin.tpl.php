<?php
/* Smarty version 5.0.2, created on 2024-04-04 21:09:31
  from 'file:offer-admin.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.0.2',
  'unifunc' => 'content_660f170b80d589_62388508',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7267cc72c11bcf7cc90dc061c6267097603b8b0f' => 
    array (
      0 => 'offer-admin.tpl',
      1 => 1712264968,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_660f170b80d589_62388508 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\seanl\\Documents\\Code\\Stage-A2Prix\\view\\template';
?><html>
<div class="offer-container">
    <div id="offer-123" class="offer-background closed">
        <div class="top-part">
            <div class="offer-left">
                <div class="offer-title">
                    <h1 class="offer-h1"><?php echo $_smarty_tpl->getValue('company');?>
</h1>
                    <input class="offer-h1-input"></input>
                    <a class="offer-sep"> - </a>
                    <h2 class="offer-h2"><?php echo $_smarty_tpl->getValue('poste');?>
</h2>
                    <input class="offer-h2-input"></input>
                </div>
                <p class="offer-address"><?php echo $_smarty_tpl->getValue('adress');?>
</p>
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
                        <p class="offer-carac-text"><?php echo $_smarty_tpl->getValue('sector');?>
</p>
                        <input class="offer-carac-input"></input>
                    </div>
                    <div class="offer-carac">
                        <a class="offer-money">&nbsp</a>
                        <p class="offer-carac-text"><?php echo $_smarty_tpl->getValue('money');?>
</p>
                        <input class="offer-carac-input"></input>
                    </div>
                    <div class="offer-carac">
                        <a class="offer-people">&nbsp</a>
                        <p class="offer-carac-text"><?php echo $_smarty_tpl->getValue('openings');?>
 ont postulé</p>
                        <input class="offer-carac-input"></input>
                    </div>
                </div>
            </div>
        </div>
        <div class="offer-line-vertical"><div></div></div>
        <div class="bottom-part">
            <div class="bottom-left">
                <p class="offer-description"><?php echo $_smarty_tpl->getValue('description');?>
</p>
                <input class="offer-description-input"></input>
            </div>
            <div class="offer-line"><div></div></div>
            <div class="bottom-right">
                <div class="offer-carac">
                    <a class="offer-time">&nbsp</a>
                    <p class="offer-carac-text"><?php echo $_smarty_tpl->getValue('duration');?>
 jours</p>
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
</html><?php }
}
