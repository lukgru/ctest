<?php /* Smarty version Smarty-3.1.14, created on 2013-07-18 21:21:10
         compiled from "templates/errors/default.tpl" */ ?>
<?php /*%%SmartyHeaderCode:105785065951e84026853a91-35470737%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b946bf41c78b0450dd6fd55350585cc965b97240' => 
    array (
      0 => 'templates/errors/default.tpl',
      1 => 1373572887,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '105785065951e84026853a91-35470737',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_51e840268a42f3_03035678',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e840268a42f3_03035678')) {function content_51e840268a42f3_03035678($_smarty_tpl) {?><h2>Error was occured.</h2>
<?php if (isset($_smarty_tpl->tpl_vars['message']->value)){?>
    <p><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</p>
<?php }else{ ?>
    <p>An unexpected error occurred.</p>
<?php }?><?php }} ?>