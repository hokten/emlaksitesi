<?php /* Smarty version 2.6.19, created on 2008-06-18 01:54:59
         compiled from emlakekleadim2.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'emlakekleadim2.html', 32, false),)), $this); ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

            <script type="text/javascript" src="adres.js"></script>
        </head>
    <body>
        <center>
            <form action="emlakekleadim3.php" method="post" name="ekle">
                <table cellpadding="5" cellspacing="0">
                    <tr>
                        <td>
                            Emlak Sahibi
                        </td>
                        <td>
                            <input type="text" name="emlaksahibi">
                        </td>
                    </tr>
                    <tr>
                        <td>
                           Adres 
                        </td>
                        <td>
                            <input type="text" name="adres">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Emlak Durumu
                        </td>
                        <td>
                                <?php echo smarty_function_html_options(array('name' => 'emlaktipi','options' => $this->_tpl_vars['emlakdurumlari']), $this);?>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            İl
                        </td>
                        <td>
                            <select name="il" style="width:150px">
                                <option></option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            İlçe
                        </td>
                        <td>
                            <select name="ilce" style="width:150px">
                                <option></option>
                            </select>
                            <script type="text/javascript">
                                var mform_4 = new Form('ekle');
                                var adres_4 = mform_4.adres('','il','ilce','');             
                                adres_4.getir('','41','497','');
                            </script>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Isıtma Tipi
                        </td>
                        <td>
                            <?php echo smarty_function_html_options(array('name' => 'isitmatipi','options' => $this->_tpl_vars['isitma']), $this);?>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            Isıtma Tipi
                        </td>
                        <td>
                            <table cellpadding="0" cellspacing="0">
                                <?php $_from = $this->_tpl_vars['ayrintilar']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="detay<?php echo $this->_tpl_vars['k']; ?>
" value="<?php echo $this->_tpl_vars['k']; ?>
"><?php echo $this->_tpl_vars['v']; ?>

                                    </td>
                                    <td>
                                        <input type="checkbox" name="detay<?php echo $this->_tpl_vars['k']; ?>
" value="<?php echo $this->_tpl_vars['k']; ?>
"><?php echo $this->_tpl_vars['v']; ?>

                                    </td>
                                    <td>
                                        <input type="checkbox" name="detay<?php echo $this->_tpl_vars['k']; ?>
" value="<?php echo $this->_tpl_vars['k']; ?>
"><?php echo $this->_tpl_vars['v']; ?>

                                    </td>
                                </tr>
                                <?php endforeach; endif; unset($_from); ?>
                            </table>
                        </td>
                    </tr>

                    </table>
                <input type="hidden" name="EmlakTipi" value="<?php echo $_POST['emlaktipi']; ?>
">
            </form>
        </center>
    </body>
</html>