/*
 * Adres v0.1
 * Yazan  : Ertugrul Yildirim - HunTER
 * Ulasim : iletisim@eyildirim.org
*/

// Form
// ---------------------------------------------
function Form(isim){
	var mform = {

		// Cagir
		cagir : function(isim){
			mform.form = document.forms[isim];
		},

		// Liste
		liste : function(isim){
			var liste = {
				cagir : function(isim){
					liste.select = mform.form.elements[isim];
				},
				ekle : function(deger,metin){
					var secenek   = document.createElement('OPTION');
					secenek.value = deger;
					secenek.text  = metin;
					liste.select.options.add(secenek);
				},
				kaldir : function(no){
					liste.select.options[no] = null;
				},
				yenile : function(dizi){
					liste.temizle();
					if(dizi){
						for(i=0; i<dizi.length; i++){
							liste.ekle(dizi[i][0],dizi[i][1]);
						}
					}
				},
				temizle : function(){
					for(i=liste.select.options.length-1; i>=0; i--){
						liste.kaldir([i]);
					}
				}
			}
			if(isim) liste.cagir(isim);
			return liste;
		},

		// Adres
		adres : function(ulke,il,ilce,semt){
			var adres = {
				ulke  : mform.liste(ulke),
				il    : mform.liste(il),
				ilce  : mform.liste(ilce),
				semt  : mform.liste(semt),
				secim : 'hayir',
				getir : function(ulke,il,ilce,semt){
					var xhr = new XHR('adres.php');
					xhr.talep('tur=ulke&ulke='+ulke+'&il='+il+'&ilce='+ilce+'&secim='+adres.secim);
					xhr.islem = function(){
						var cevap = xhr.cevap();
						eval('var dizi='+cevap);
						if(adres.ulke.select){
							adres.ulke.yenile(dizi.ulke);
							adres.ulke.select.value = ulke;
							adres.ulke.select.onchange = function(){ adres.yenile('il','ulke='+adres.ulke.select.value); }
						}
						if(adres.il.select){
							adres.il.yenile(dizi.il);
							adres.il.select.value = il;
							adres.il.select.onchange = function(){ adres.yenile('ilce','il='+adres.il.select.value); }
						}
						if(adres.ilce.select){
							adres.ilce.yenile(dizi.ilce);
							adres.ilce.select.value = ilce;
							adres.ilce.select.onchange = function(){ adres.yenile('semt','ilce='+adres.ilce.select.value); }
						}
						if(adres.semt.select){
							adres.semt.yenile(dizi.semt);
							adres.semt.select.value = semt;
						}
					}
				},
				yenile : function(tur,ust){
					var xhr = new XHR('adres.php');
					xhr.talep('tur='+tur+'&'+ust+'&secim='+adres.secim);
					xhr.islem = function(){
						eval('var dizi='+xhr.cevap());
						if(tur == 'il') adres.il.yenile(dizi.il);
						if(tur == 'il' || tur == 'ilce') adres.ilce.yenile(dizi.ilce);
						if(tur == 'il' || tur == 'ilce' || tur == 'semt') adres.semt.yenile(dizi.semt);
					}
				}
			}
			return adres;
		}
	}

	if(isim) mform.cagir(isim);
	return mform;
}

// XHR
// ---------------------------------------------
function XHR(hedef){
	var xhr = {

		// Islem
		islem : function(){
			return true;
		},

		// Baglan
		baglan : function(hedef){
			this.xhr = new _xhr(this);
			this.xhr.open('POST',hedef,true);
			this.xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded; charset=utf-8');
		},

		// Talep
		talep : function(talep){
			this.xhr.send(talep);
		},

		// Cevap
		cevap : function(){
			return this.xhr.responseText;
		}
	}

	// Baglan ...
	if(hedef) xhr.baglan(hedef);
	return xhr;
}

// XHR - Temel
// ---------------------------------------------
function _xhr(nesne){
	var xhr;

	/*@cc_on @*/
	/*@if (@_jscript_version >= 5)
	try { xhr = new ActiveXObject("Msxml2.XMLHTTP"); }
	catch(e) {
		try{ xhr = new ActiveXObject("Microsoft.XMLHTTP"); }
		catch(e){ xhr = false; }
	}
	@else xhr=false; @end @*/

	if(!xhr && typeof XMLHttpRequest != 'undefined'){
		try{ xhr = new XMLHttpRequest(); }
		catch (e){ xhr = false; }
	}

	xhr.onreadystatechange = function(){
		if(xhr.readyState == 4 && xhr.status == 200) nesne.islem();
	};

	return xhr;
}