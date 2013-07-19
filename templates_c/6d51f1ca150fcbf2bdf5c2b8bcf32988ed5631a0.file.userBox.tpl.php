<?php /* Smarty version Smarty-3.1.14, created on 2013-07-19 09:57:12
         compiled from "templates/user/userBox.tpl" */ ?>
<?php /*%%SmartyHeaderCode:209375614451e8f158938554-64910418%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d51f1ca150fcbf2bdf5c2b8bcf32988ed5631a0' => 
    array (
      0 => 'templates/user/userBox.tpl',
      1 => 1374134668,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '209375614451e8f158938554-64910418',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_51e8f158973b92_49094903',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e8f158973b92_49094903')) {function content_51e8f158973b92_49094903($_smarty_tpl) {?><div class="user">
    User id: <?php echo $_smarty_tpl->tpl_vars['user']->value->getId();?>
<br/>
    Name: <?php echo $_smarty_tpl->tpl_vars['user']->value->getName();?>
<br/>
    Surname: <?php echo $_smarty_tpl->tpl_vars['user']->value->getSurname();?>
<br/>
    Age: <?php echo $_smarty_tpl->tpl_vars['user']->value->getAge();?>
<br/>
    Gender: <?php echo $_smarty_tpl->tpl_vars['user']->value->getGender();?>
<br/>
    <a href="user,<?php echo $_smarty_tpl->tpl_vars['user']->value->getId();?>
.html">view user details</a>
</div><?php }} ?>