<?php /* Smarty version Smarty-3.1.18, created on 2014-10-10 10:19:50
         compiled from "/home/yubin/www/jsbyz/app/View/Index/index.html" */ ?>
<?php /*%%SmartyHeaderCode:6801288405435ee95e020c1-23171356%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c7c6f04f45d92ef7c2e1b56698d1228f8344cd94' => 
    array (
      0 => '/home/yubin/www/jsbyz/app/View/Index/index.html',
      1 => 1412907523,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6801288405435ee95e020c1-23171356',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5435ee95e2efb0_02146820',
  'variables' => 
  array (
    'tables' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5435ee95e2efb0_02146820')) {function content_5435ee95e2efb0_02146820($_smarty_tpl) {?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>Hello World  !ds</h1>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>username</th>
                <th>sign_time</th>
                <th>sign_type</th>
            </tr>
        </thead>
        <tbody>
             <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tables']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['username'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['sign_time'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['sign_type'];?>
</td>
                </tr>
             <?php } ?>
        </tbody>
    </table>
   
</body>
</html><?php }} ?>
