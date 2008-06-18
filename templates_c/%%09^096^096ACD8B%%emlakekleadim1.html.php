<?php /* Smarty version 2.6.19, created on 2008-06-17 22:41:42
         compiled from emlakekleadim1.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'emlakekleadim1.html', 11, false),)), $this); ?>
<html>
    <body>
        <center>
            <form action="emlakekleadim2.php" method="post">
                <table cellpadding="5" cellspacing="0">
                    <tr>
                        <td>Emlak Tipi</td>
                        <td>:</td>
                        <td>
                            <select name="emlaktipi">
                                <?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['emlak_tablo'],'output' => $this->_tpl_vars['emlak_tipleri']), $this);?>

                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" colspan="3">
                            <input type="submit" value="Devam Et">
                        </td>
                    </tr>
                </table>
            </form>
        </body>
    </center>
</html>
