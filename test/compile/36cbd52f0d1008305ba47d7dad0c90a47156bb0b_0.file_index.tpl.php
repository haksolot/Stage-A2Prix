<?php
/* Smarty version 5.0.2, created on 2024-04-02 20:53:35
  from 'file:index.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.0.2',
  'unifunc' => 'content_660c704f6937d1_53920698',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '36cbd52f0d1008305ba47d7dad0c90a47156bb0b' => 
    array (
      0 => 'index.tpl',
      1 => 1711878839,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_660c704f6937d1_53920698 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\seanl\\Documents\\Code\\Stage-A2Prix\\test\\template';
?><!-- index.tpl -->
<html>
<head>
    <title>StageA2Prix</title>
    <link rel="stylesheet" type="text/css" href="/style/test.css">
</head>
<body>
    <h1 class="text"><?php echo $_smarty_tpl->getValue('heading');?>
</h1>
    <p><?php echo $_smarty_tpl->getValue('content');?>
</p>
</body>
</html>
<?php }
}
