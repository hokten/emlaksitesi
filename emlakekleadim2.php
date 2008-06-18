<?php
require('/var/www/localhost/htdocs/emlakim/Smarty/libs/Smarty.class.php');
include "veriler.php";
$smarty = new Smarty();

$smarty->template_dir = '/var/www/localhost/htdocs/emlakim/templates';
$smarty->compile_dir = '/var/www/localhost/htdocs/emlakim/templates_c';
$smarty->cache_dir = '/var/www/localhost/htdocs/emlakim/cache';
$smarty->config_dir = '/var/www/localhost/htdocs/emlakim/configs';
$smarty->assign('emlakdurumlari', array(
    1 => 'Satılık',
    2 => 'Kiralık',
    3 => 'Takas',
    4 => 'Devremülk'));
$smarty->assign('isitma',$isitma_verileri);
$smarty->display('emlakekleadim2.html');
?> 
