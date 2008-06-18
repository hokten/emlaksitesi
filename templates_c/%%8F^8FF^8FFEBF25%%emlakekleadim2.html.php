<?php /* Smarty version 2.6.19, created on 2008-06-18 19:34:42
         compiled from emlakekleadim2.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'emlakekleadim2.html', 37, false),)), $this); ?>
<html>
    <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
	<?php echo '
	body{font-size:12px;font-family:Trebuchet MS;color:#444444}}
	'; ?>

</style>

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
                            Ýl
                        </td>
                        <td>
                            <select name="il" style="width:150px">
                                <option></option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Ýlçee
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
                            Isýtma Tipi
                        </td>
                        <td>
                            <?php echo smarty_function_html_options(array('name' => 'isitmatipi','options' => $this->_tpl_vars['isitma']), $this);?>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            Ayrýntýlar
                        </td>
			<td>
				<table border=1>
					<?php unset($this->_sections['oi']);
$this->_sections['oi']['name'] = 'oi';
$this->_sections['oi']['loop'] = is_array($_loop=$this->_tpl_vars['ayrintilar']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['oi']['show'] = true;
$this->_sections['oi']['max'] = $this->_sections['oi']['loop'];
$this->_sections['oi']['step'] = 1;
$this->_sections['oi']['start'] = $this->_sections['oi']['step'] > 0 ? 0 : $this->_sections['oi']['loop']-1;
if ($this->_sections['oi']['show']) {
    $this->_sections['oi']['total'] = $this->_sections['oi']['loop'];
    if ($this->_sections['oi']['total'] == 0)
        $this->_sections['oi']['show'] = false;
} else
    $this->_sections['oi']['total'] = 0;
if ($this->_sections['oi']['show']):

            for ($this->_sections['oi']['index'] = $this->_sections['oi']['start'], $this->_sections['oi']['iteration'] = 1;
                 $this->_sections['oi']['iteration'] <= $this->_sections['oi']['total'];
                 $this->_sections['oi']['index'] += $this->_sections['oi']['step'], $this->_sections['oi']['iteration']++):
$this->_sections['oi']['rownum'] = $this->_sections['oi']['iteration'];
$this->_sections['oi']['index_prev'] = $this->_sections['oi']['index'] - $this->_sections['oi']['step'];
$this->_sections['oi']['index_next'] = $this->_sections['oi']['index'] + $this->_sections['oi']['step'];
$this->_sections['oi']['first']      = ($this->_sections['oi']['iteration'] == 1);
$this->_sections['oi']['last']       = ($this->_sections['oi']['iteration'] == $this->_sections['oi']['total']);
?>
					<?php if ($this->_sections['oi']['index'] % 3 == 0): ?><tr><?php endif; ?>
						<td width=252>
							<input type="checkbox" name="ozellik<?php echo $this->_sections['oi']['index']; ?>
" value=<?php echo $this->_sections['oi']['index']; ?>
><?php echo $this->_tpl_vars['ayrintilar'][$this->_sections['oi']['index']]; ?>

						</td>
						<?php if ($this->_sections['oi']['index'] % 3 == 2): ?></tr><?php endif; ?>
					<?php endfor; endif; ?>
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