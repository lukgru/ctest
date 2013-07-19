<?php /* Smarty version Smarty-3.1.14, created on 2013-07-18 21:21:10
         compiled from "templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:212442883351e840268a9f42-42948943%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90093ad09988b466f409a1871733c5589014713e' => 
    array (
      0 => 'templates/index.tpl',
      1 => 1374007981,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '212442883351e840268a9f42-42948943',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cssFiles' => 0,
    'cssFile' => 0,
    'jsFiles' => 0,
    'jsFile' => 0,
    'body_content' => 0,
    'jsPostloadFiles' => 0,
    'jsPostloadFile' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_51e84026948f44_84122532',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51e84026948f44_84122532')) {function content_51e84026948f44_84122532($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pl" xml:lang="pl">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="pl" />
        <meta name="author" content="Łukasz Gruszka" />
        <?php if (isset($_smarty_tpl->tpl_vars['cssFiles']->value)&&is_array($_smarty_tpl->tpl_vars['cssFiles']->value)){?>
            <?php  $_smarty_tpl->tpl_vars['cssFile'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cssFile']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cssFiles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cssFile']->key => $_smarty_tpl->tpl_vars['cssFile']->value){
$_smarty_tpl->tpl_vars['cssFile']->_loop = true;
?>
                <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['cssFile']->value['href'];?>
" type="<?php echo $_smarty_tpl->tpl_vars['cssFile']->value['type'];?>
" <?php if (isset($_smarty_tpl->tpl_vars['cssFile']->value['media'])&&$_smarty_tpl->tpl_vars['cssFile']->value['media']){?>media="<?php echo $_smarty_tpl->tpl_vars['cssFile']->value['media'];?>
"<?php }?> />
            <?php } ?>
        <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['jsFiles']->value)&&is_array($_smarty_tpl->tpl_vars['jsFiles']->value)){?>
            <?php  $_smarty_tpl->tpl_vars['jsFile'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['jsFile']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['jsFiles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['jsFile']->key => $_smarty_tpl->tpl_vars['jsFile']->value){
$_smarty_tpl->tpl_vars['jsFile']->_loop = true;
?>
                <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['jsFile']->value;?>
"></script>
            <?php } ?>
        <?php }?>
    </head>
    <body>
        <?php echo $_smarty_tpl->tpl_vars['body_content']->value;?>

        <?php if (isset($_smarty_tpl->tpl_vars['jsPostloadFiles']->value)&&is_array($_smarty_tpl->tpl_vars['jsPostloadFiles']->value)){?>
            <?php  $_smarty_tpl->tpl_vars['jsPostloadFile'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['jsPostloadFile']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['jsPostloadFiles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['jsPostloadFile']->key => $_smarty_tpl->tpl_vars['jsPostloadFile']->value){
$_smarty_tpl->tpl_vars['jsPostloadFile']->_loop = true;
?>
                <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['jsPostloadFile']->value;?>
"></script>
            <?php } ?>
        <?php }?>
    </body>
</html><?php }} ?>