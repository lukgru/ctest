<?php /* Smarty version Smarty-3.1.14, created on 2013-07-19 14:02:09
         compiled from "templates/user/userMain.tpl" */ ?>
<?php /*%%SmartyHeaderCode:180753502351e92ac1915ba3-67332309%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '47a1dd6f83bbcd52a4f1c2ae1f1def1d7f8757f0' => 
    array (
      0 => 'templates/user/userMain.tpl',
      1 => 1374005911,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '180753502351e92ac1915ba3-67332309',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
    'friends' => 0,
    'friend' => 0,
    'friends2nd' => 0,
    'friends2nd2' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_51e92ac19e5010_50998329',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e92ac19e5010_50998329')) {function content_51e92ac19e5010_50998329($_smarty_tpl) {?><h2><a href="/">Users</a> &raquo; User</h2>
<?php echo $_smarty_tpl->getSubTemplate ("user/userBox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('user'=>$_smarty_tpl->tpl_vars['user']->value), 0);?>

<h2>Friends</h2>
<?php if (isset($_smarty_tpl->tpl_vars['friends']->value)&&is_array($_smarty_tpl->tpl_vars['friends']->value)){?>
    <div class="users">
        <?php  $_smarty_tpl->tpl_vars['friend'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['friend']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['friends']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['friend']->key => $_smarty_tpl->tpl_vars['friend']->value){
$_smarty_tpl->tpl_vars['friend']->_loop = true;
?>
            <?php echo $_smarty_tpl->getSubTemplate ("user/userBox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('user'=>$_smarty_tpl->tpl_vars['friend']->value), 0);?>

        <?php } ?>
    </div>
<?php }else{ ?>
    <p>No available friends.</p>
<?php }?>
<h2>Friends 2-nd</h2>
<?php if (isset($_smarty_tpl->tpl_vars['friends2nd']->value)&&is_array($_smarty_tpl->tpl_vars['friends2nd']->value)){?>
    <div class="users">
        <?php  $_smarty_tpl->tpl_vars['friend'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['friend']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['friends2nd']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['friend']->key => $_smarty_tpl->tpl_vars['friend']->value){
$_smarty_tpl->tpl_vars['friend']->_loop = true;
?>
            <?php echo $_smarty_tpl->getSubTemplate ("user/userBox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('user'=>$_smarty_tpl->tpl_vars['friend']->value), 0);?>

        <?php } ?>
    </div>
<?php }else{ ?>
    <p>No available friends.</p>
<?php }?>
<h2>Friends 2-nd with 2 connections</h2>
<?php if (isset($_smarty_tpl->tpl_vars['friends2nd2']->value)&&is_array($_smarty_tpl->tpl_vars['friends2nd2']->value)){?>
    <div class="users">
        <?php  $_smarty_tpl->tpl_vars['friend'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['friend']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['friends2nd2']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['friend']->key => $_smarty_tpl->tpl_vars['friend']->value){
$_smarty_tpl->tpl_vars['friend']->_loop = true;
?>
            <?php echo $_smarty_tpl->getSubTemplate ("user/userBox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('user'=>$_smarty_tpl->tpl_vars['friend']->value), 0);?>

        <?php } ?>
    </div>
<?php }else{ ?>
    <p>No available friends.</p>
<?php }?><?php }} ?>