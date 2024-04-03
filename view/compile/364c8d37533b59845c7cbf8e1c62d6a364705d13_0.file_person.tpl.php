<?php
/* Smarty version 5.0.2, created on 2024-04-03 09:54:27
  from 'file:person.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.0.2',
  'unifunc' => 'content_660d2753ba4a95_91003750',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '364c8d37533b59845c7cbf8e1c62d6a364705d13' => 
    array (
      0 => 'person.tpl',
      1 => 1712137126,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_660d2753ba4a95_91003750 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\seanl\\Documents\\Code\\Stage-A2Prix\\view\\template';
?><html>
<head></head>
<div id="<?php echo $_smarty_tpl->getValue('id');?>
" class="person-background">
  <div class="person-icon-container">
    <a class="person-icon">&nbsp</a>
  </div>
  <h1 class="person-h1"><?php echo $_smarty_tpl->getValue('name');?>
 <?php echo $_smarty_tpl->getValue('surname');?>
</h1>
  <h2 id="person-center" class="person-h2"><?php echo $_smarty_tpl->getValue('campus');?>
</h2>
  <h2 id="person-promotion" class="person-h2"><?php echo $_smarty_tpl->getValue('promotion');?>
</h2>
</div>
</html><?php }
}
