<?php
require('/var/www/localhost/htdocs/emlaksitesi/Smarty/libs/Smarty.class.php');
$smarty = new Smarty();
//
$smarty->template_dir = '/var/www/localhost/htdocs/emlaksitesi/templates';
$smarty->compile_dir = '/var/www/localhost/htdocs/emlaksitesi/templates_c';
$smarty->cache_dir = '/var/www/localhost/htdocs/emlaksitesi/cache';
$smarty->config_dir = '/var/www/localhost/htdocs/emlaksitesi/configs';
$smarty->assign('emlak_tipleri', array(
    'Konut',
    'İşyeri',
    'Villa',
    'Arsa'));
$smarty->assign('emlak_tablo', array('konut','isyeri','villa','arsa'));
$smarty->assign('emlak_sec', 'konut');
$smarty->display('emlakekleadim1.html');
?> 
