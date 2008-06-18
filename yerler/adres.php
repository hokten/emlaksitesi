<?
/*
 * Adres v0.1
 * Yazan  : Ertugrul Yildirim - HunTER
 * Ulasim : iletisim@eyildirim.org
*/

# Adres
# ---------------------------------------------------------
header('content-type: text/html; charset=utf-8');
mysql_connect('localhost','root','66666666');
mysql_select_db('emlaklar');

mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER SET utf8");
mysql_query("SET COLLATION_CONNECTION = 'utf8_turkish_ci'");

$adres = new Adres($_REQUEST);
$adres->Cikart();

# Adres
# ---------------------------------------------------------
class Adres{
	var $tur;
	var $ulkeno;
	var $ilno;
	var $ilceno;
	var $secim;

	# Kurucu
	# ---------------------------------------------------------
	function Adres($talep){
		mysql_query("SET NAMES 'utf8'");
		mysql_query("SET CHARACTER SET utf8");
		mysql_query("SET COLLATION_CONNECTION = 'utf8_turkish_ci'");

		$this->tur    = $talep['tur'];
		$this->ulkeno = $talep['ulke'];
		$this->ilno   = $talep['il'];
		$this->ilceno = $talep['ilce'];
		$this->semtno = $talep['semt'];
		$this->secim  = $talep['secim'];
	}

	# Cikart
	# ---------------------------------------------------------
	function Cikart(){

		// Secim
		if($this->secim == 'evet'){
			$ulke[] = "['','Seçiniz ...']";
			$il[]   = "['','Seçiniz ...']";
			$ilce[] = "['','Seçiniz ...']";
			$semt[] = "['','Seçiniz ...']";
		}

		// Ulke
		if($this->tur == 'ulke'){
			$sorgu = mysql_query("SELECT no,ulke FROM adres_ulke ORDER BY sira DESC, ulke ASC");
			while($sonuc = mysql_fetch_assoc($sorgu)) $ulke[] = "['$sonuc[no]','$sonuc[ulke]']";
		}

		// Il
		if($this->tur == 'ulke' or $this->tur == 'il'){
			if(!$this->ulkeno){
				$sorgu = mysql_query("SELECT no FROM adres_ulke ORDER BY sira DESC, ulke ASC LIMIT 1");
				$sonuc = mysql_fetch_assoc($sorgu);
				$this->ulkeno = $sonuc['no'];
			}
			$sorgu = mysql_query("SELECT no,il FROM adres_il WHERE ulke='$this->ulkeno' ORDER BY sira DESC, il ASC");
			while($sonuc = mysql_fetch_assoc($sorgu)) $il[] = "['$sonuc[no]','$sonuc[il]']";
		}

		// Ilce
		if($this->tur == 'ulke' or $this->tur == 'il' or $this->tur == 'ilce'){
			if(!$this->ilno){
				$sorgu = mysql_query("SELECT no FROM adres_il WHERE ulke='$this->ulkeno' ORDER BY sira DESC, il ASC LIMIT 1");
				$sonuc = mysql_fetch_assoc($sorgu);
				$this->ilno = $sonuc['no'];
			}
			$sorgu = mysql_query("SELECT no,ilce FROM adres_ilce WHERE il='$this->ilno' ORDER BY sira DESC, ilce ASC");
			while($sonuc = mysql_fetch_assoc($sorgu)) $ilce[] = "['$sonuc[no]','$sonuc[ilce]']";
		}

		// Semt
		if($this->tur == 'ulke' or $this->tur == 'il' or $this->tur == 'ilce' or $this->tur == 'semt'){
			if(!$this->ilceno){
				$sorgu = mysql_query("SELECT no FROM adres_ilce WHERE il='$this->ilno' ORDER BY sira DESC, ilce ASC LIMIT 1");
				$sonuc = mysql_fetch_assoc($sorgu);
				$this->ilceno = $sonuc['no'];
			}
			$sorgu = mysql_query("SELECT no,semt FROM adres_semt WHERE ilce='$this->ilceno' ORDER BY sira DESC, semt ASC");
			while($sonuc = mysql_fetch_assoc($sorgu)) $semt[] = "['$sonuc[no]','$sonuc[semt]']";
		}

		// Dizi
		if(is_array($ulke)) $cikti[] = '\'ulke\':['.implode(',',$ulke).']';
		if(is_array($il))   $cikti[] = '\'il\':['.implode(',',$il).']';
		if(is_array($ilce)) $cikti[] = '\'ilce\':['.implode(',',$ilce).']';
		if(is_array($semt)) $cikti[] = '\'semt\':['.implode(',',$semt).']';

		if(is_array($cikti)) echo '{'.implode(',',$cikti).'}';
		else echo '{}';
	}
}
?>
