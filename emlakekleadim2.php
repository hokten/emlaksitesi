<?php
require('/var/www/localhost/htdocs/emlaksitesi/Smarty/libs/Smarty.class.php');
include "veriler.php";
$smarty = new Smarty();

$smarty->template_dir = '/var/www/localhost/htdocs/emlaksitesi/templates';
$smarty->compile_dir = '/var/www/localhost/htdocs/emlaksitesi/templates_c';
$smarty->cache_dir = '/var/www/localhost/htdocs/emlaksitesi/cache';
$smarty->config_dir = '/var/www/localhost/htdocs/emlaksitesi/configs';
$smarty->assign('emlakdurumlari', array(
    1 => 'Sat�l�k',
    2 => 'Kiral�k',
    3 => 'Takas',
    4 => 'Devrem�lk'));
$smarty->assign('isitma',$isitma_verileri);
$smarty->assign('ayrintilar',$ayrintilar);

$smarty->display('emlakekleadim2.html');
?> 
