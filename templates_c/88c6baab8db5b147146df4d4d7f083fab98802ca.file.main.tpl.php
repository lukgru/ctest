<?php /* Smarty version Smarty-3.1.14, created on 2013-07-19 09:57:12
         compiled from "templates/main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:43849303151e8f1588b5032-98026349%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88c6baab8db5b147146df4d4d7f083fab98802ca' => 
    array (
      0 => 'templates/main.tpl',
      1 => 1374173733,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '43849303151e8f1588b5032-98026349',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'users' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_51e8f158930d24_09847771',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e8f158930d24_09847771')) {function content_51e8f158930d24_09847771($_smarty_tpl) {?><h2>Users</h2>
<?php if (isset($_smarty_tpl->tpl_vars['users']->value)&&is_array($_smarty_tpl->tpl_vars['users']->value)){?>
    <div class="users">
        <?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value){
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
            <?php echo $_smarty_tpl->getSubTemplate ("user/userBox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('user'=>$_smarty_tpl->tpl_vars['user']->value), 0);?>

        <?php } ?>
    </div>
<?php }else{ ?>
    <p>No available users.</p>
<?php }?><?php }} ?>