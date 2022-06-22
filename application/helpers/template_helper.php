<?php

	function get_template_directory($path)
	{
		return base_url()."public_style/".$path;
	}

	function get_template_admin($path)
	{
		return base_url()."public_style/admin/".$path;
	}

	function get_template_admin_view($view){
		$_this =& get_instance();
		return $_this->load->view('admin/'.$view);
	}
	function get_template_home($view){
		$_this =& get_instance();
		return $_this->load->view($view);
	}

	function is_active_page_print($page, $class)
	{
		$_this =& get_instance();
		if ($page == $_this->uri->segment(1)) 
		{
			return $class;
		}
	}

	function is_active_page_print_rep($segment, $page, $class)
	{
		$_this =& get_instance();
		if ($page == $_this->uri->segment($segment)) 
		{
			return $class;
		}
	}

	function is_active_page_print_umkm($page, $class)
	{
		$_this =& get_instance();
		if ($page == $_this->uri->segment(1)) 
		{
			return $class;
		}
	}

	function http_request($url)
	{
    // persiapkan curl
    $ch = curl_init(); 

    // set url 
    curl_setopt($ch, CURLOPT_URL, $url);
    
    // set user agent    
    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

    // return the transfer as a string 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

    // $output contains the output string 
    $output = curl_exec($ch); 

    // tutup curl 
    curl_close($ch);      

    // mengembalikan hasil curl
    return $output;
	}

	function strip_jika_kosong($str)
	{
		if (empty($str)) 
		{
			return '-';
		}
		else
		{
			return $str;
		}
	}

	function unique_multidim_array($array, $key) 
	{
	    $temp_array = array();
	    $i = 0;
	    $key_array = array();
	   
	    foreach($array as $val) {
	        if (!in_array($val[$key], $key_array)) {
	            $key_array[$i] = $val[$key];
	            $temp_array[$i] = $val;
	        }
	        $i++;
	    }
	    return $temp_array;
	}

	function link_strip_to_titik($str)
	{
		return str_replace('-', '.', $str);
	}

	function link_underscore_to_space($str)
	{
		return str_replace('_', ' ', $str);
	}

	function base64url_encode($data) {
	  return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
	}

	function base64url_decode($data) {
	  return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
	}

	function array_orderby()
	{
	    $args = func_get_args();
	    $data = array_shift($args);
	    foreach ($args as $n => $field) {
	        if (is_string($field)) {
	            $tmp = array();
	            foreach ($data as $key => $row)
	                $tmp[$key] = $row[$field];
	            $args[$n] = $tmp;
	            }
	    }
	    $args[] = &$data;
	    call_user_func_array('array_multisort', $args);
	    return array_pop($args);
	}

	// function decrypt_($str)
	// {
	// 	// Store cipher method 
	// 	$ciphering = "BF-CBC"; 
	// 	// Use OpenSSl encryption method 
	// 	$iv_length = openssl_cipher_iv_length($ciphering); 
	// 	$encryption_iv = random_bytes($iv_length); 
	// 	// 16 digit values 
	// 	$options = 0; 
		  
	// 	// Store the decryption key 
	// 	$decryption_key = openssl_digest(php_uname(), 'MD5', TRUE); 
		  
	// 	// Descrypt the string 
	// 	$decryption = openssl_decrypt($str, $ciphering, 
	// 	            $decryption_key, $options, $encryption_iv); 
		  
	// 	return $decryption;
	// }
	// function encrypt_($str)
	// {	  
	// 	// Store cipher method 
	// 	$ciphering = "BF-CBC"; 
		  
	// 	// Use OpenSSl encryption method 
	// 	$iv_length = openssl_cipher_iv_length($ciphering); 
	// 	$options = 0; 
		  
	// 	// Use random_bytes() function which gives 
	// 	// randomly 16 digit values 
	// 	$encryption_iv = random_bytes($iv_length); 
		  
	// 	// Alternatively, we can use any 16 digit 
	// 	// characters or numeric for iv 
	// 	$encryption_key = openssl_digest(php_uname(), 'MD5', TRUE); 
		  
	// 	// Encryption of string process starts 
	// 	$encryption = openssl_encrypt($str, $ciphering, 
	// 	        $encryption_key, $options, $encryption_iv); 
		  
	// 	return $encryption;
	// }

	function strposa($haystack, $needles=array(), $offset=0) 
	{
        $chr = array();
        foreach($needles as $needle) {
                $res = strpos($haystack, $needle, $offset);
                if ($res !== false) $chr[$needle] = $res;
        }
        if(empty($chr)) return false;
        return min($chr);
	}

	function is_active_detail_umkm($page, $class)
	{
		$_this =& get_instance();
		if ($page == $_this->uri->segment(4)) 
		{
			return $class;
		}
	}

	function get_ext($data)
	{
		$array = explode(".",$data);

		$lastKey = key(array_slice($array, -1, 1, true));
		return $array[$lastKey];
	}

	function get_file_download($namafile)
	{
		global $SConfig;

		$fotopath = "./uploads/".$namafile;
		return $SConfig->_site_url.str_replace("./", "/", $fotopath);
	}

	function berita_value($edit, $value)
	{
		if ($edit == TRUE) 
		{
			return $value;
		}
	}

	function berita_value_cover($edit, $value)
	{
		if ($edit == false) 
		{
			return $value;
		}
	}

	function findfoto($str, $ktp, $produk=false)
	{
		global $SConfig;
		$fotopath = "./uploads/".$ktp."/".$str."*";
		if ($produk == true) 
		{
			$fotopath = "./uploads/".$ktp."/PRODUK/".$str."*";
		}
		$fotoinfo = glob($fotopath);
		$foton = $fotoinfo[0];

		$foto = $SConfig->_site_url.str_replace("./", "/", $foton);

		return $foto;
	}

	function findfotoberita($str)
	{
		global $SConfig;
		$fotopath = "./uploads/berita/".$str."*";
		$fotoinfo = glob($fotopath);
		$foton = $fotoinfo[0];

		$foto = $SConfig->_site_url.str_replace("./", "/", $foton);

		return $foto;
	}


	function show_kat($str, $select)
	{
		if ($str == $select) 
		{
			return 'show';
		}
	}

	function active_helper($str, $select)
	{
		if ($str == $select) 
		{
			return 'active';
		}
	}
	function selected_helper($str, $select)
	{
		if ($str == $select) 
		{
			return 'selected';
		}
	}

	function checked_helper($str, $select)
	{
		if ($str == $select) 
		{
			return 'checked';
		}
	}

	function checked_aktif_helper($aktif)
	{
		if ($aktif == 1) 
		{
			return 'checked';
		}
	}

	function tidak_kosong($nilai)
	{
		if ($nilai != '-') 
		{
			return $nilai;
		}
	}

	function get_akhir_kata($str)
	{
		$file = explode('/', $str);
		$lastfile = end($file);
		return $lastfile;
		// unlink($fcpath."uploads/profil/".$id_umkm.'/'.$fotohidden);
	}

	function active_komoditas($str, $post)
	{
		$_this =& get_instance();
		$link = $_this->uri->segment(3);

		if (empty($link)) 
		{
			if ($str == $post) 
			{
				return 'active';
			}
		}

		if ($str == $link) 
		{
			return 'active';
		}
	}

	function active_komoditas_default()
	{
		$_this =& get_instance();
		$link = $_this->uri->segment(3);

		if (empty($link)) 
		{
			return 'active';
		}
	}

	function select_komoditas($str)
	{
		$_this =& get_instance();
		$link = $_this->uri->segment(3);

		if ($str == $link) 
		{
			return 'selected';
		}
	}

	function active_subkat_semua($str)
	{
		$_this =& get_instance();
		$kat = replace_str_upper($_this->uri->segment(4));
		$subkat = $_this->uri->segment(5);

		if ($subkat == null) 
		{
			if ($str == $kat) 
			{
				return 'active';
			}
			
		}
	}



	function rupiah($angka)
	{
		$hasil_rupiah = number_format($angka,0,',','.');
		return $hasil_rupiah;
	}

	function plusppn10($nilai)
	{
		return $nilai + ($nilai * (10/100)); 
	}

	function rupiah_to_sql($angka)
	{
		return str_replace('.', '', $angka);
	}

	function add_no_produk($angka, $kode)
	{
		$no = sprintf("%06d", $angka);
		return $no.'-'.$kode;
	}

	function add_no_perusahaan($angka)
	{
		$no = sprintf("%05d", $angka);
		return $no;
	}

	function add_no_representatif($angka, $kode)
	{
		$no = sprintf("%06d", $angka);
		return $kode.'-'.$no;
	}

	function riset_budget($bulan)
	{
		$strdate = "+ ".$bulan." month";
		return date('Y-m-d', strtotime($strdate, strtotime(date('Y-m-d'))));
	}

	function generate_token()
	{
		$tokenhash = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890';
	    $tokenshuffle = str_shuffle($tokenhash);
	    return substr($tokenshuffle, 0, 12);
	}
	function generate_pass()
	{
		$tokenhash = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890';
	    $tokenshuffle = str_shuffle($tokenhash);
	    return substr($tokenshuffle, 0, 7);
	}

	function datepickertomysql($date)
	{
		$newdate = explode(' ', $date);

		if ($newdate[1] == 'Jan') 
		{
			$bulan = '01';
		}
		if ($newdate[1] == 'Feb') 
		{
			$bulan = '02';
		}
		if ($newdate[1] == 'Mar') 
		{
			$bulan = '03';
		}
		if ($newdate[1] == 'Apr') 
		{
			$bulan = '04';
		}
		if ($newdate[1] == 'May') 
		{
			$bulan = '05';
		}
		if ($newdate[1] == 'Jun') 
		{
			$bulan = '06';
		}
		if ($newdate[1] == 'Jul') 
		{
			$bulan = '07';
		}
		if ($newdate[1] == 'Aug') 
		{
			$bulan = '08';
		}
		if ($newdate[1] == 'Sep') 
		{
			$bulan = '09';
		}
		if ($newdate[1] == 'Oct') 
		{
			$bulan = '10';
		}
		if ($newdate[1] == 'Nov') 
		{
			$bulan = '11';
		}
		if ($newdate[1] == 'Dec') 
		{
			$bulan = '12';
		}

		$datenew = $newdate[2]."-".$bulan."-".$newdate[0];

		return $datenew;
	}

	function login_redirect($str)
	{
		$link = '';
		foreach ($str as $key => $value) 
		{
			$link .= '/'.$value;
		}
		return $link;
	}

	function get_foto_produk($namafoto)
	{
		global $SConfig;

		$fotopath = "./uploads/foto_produk/".$namafoto;
		return $SConfig->_site_url.str_replace("./", "/", $fotopath);
	}

	function get_foto_produk_detslider($key)
	{
		if ($key == 0) 
		{
			return 'active';
		}
	}

	function get_lampiran($namalampiran)
	{
		global $SConfig;

		$lampiranpath = "./uploads/lampiran_produk/".$namalampiran;
		return $SConfig->_site_url.str_replace("./", "/", $lampiranpath);
	}

	function ip_30menit($date)
	{
		$str = "+ 30 minutes";
		return date('Y-m-d H:i:s', strtotime($str, strtotime($date)));
	}

	function plusmonth($date)
	{
		$str = "+ 30 days";
		return date('Y-m-d H:i:s', strtotime($str, strtotime($date)));
	}

	function ip_5menit($date)
	{
		$str = "+ 5 minutes";
		return date('Y-m-d H:i:s', strtotime($str, strtotime($date)));
	}

	function ipminus_5menit($date)
	{
		$str = "- 5 minutes";
		return date('Y-m-d H:i:s', strtotime($str, strtotime($date)));
	}

	function server_pertama($key)
	{
		if ($key != 0) 
		{
			return 'style="display:none"';
		}
	}
	function title()
	{
		$_this =& get_instance();
		global $SConfig;

		$array_backend_page = array
							(
								'' => 'AyyStream | Streaming Anime Subtitle Indonesia',
								'genre' => 'AyyStream Genre | Streaming Anime Subtitle Indonesia',
								'anilist' => 'AyyStream List | Streaming Anime Subtitle Indonesia',
								'ongoing' => 'AyyStream Ongoing | Streaming Anime Subtitle Indonesia',
							);
		$title = NULL;
		if (array_key_exists($_this->uri->segment(1), $array_backend_page)) 
		{
			return $array_backend_page[$_this->uri->segment(1)];
		}
		elseif ($_this->uri->segment(1) == 'nonton') 
		{
			return str_replace('_', ' ', $_this->uri->segment(3))." | Streaming Anime Sub Indonesia";
		}
	}

	function meta()
	{
		$_this =& get_instance();
		global $SConfig;

		if ($_this->uri->segment(1) == 'nonton') 
		{
			return "Nonton Anime ".str_replace('_', ' ', $_this->uri->segment(3))." Subtitle Indonesia Streaming dan Download 1080p, 720p dan 480p. Klik disini untuk menonton Anime ".str_replace('_', ' ', $_this->uri->segment(3))." dengan Subtitle Indonesia";
		}
		else
		{
			return "Nonton Anime Subtitle Indonesia Streaming dan Download 1080p, 720p dan 480p. Klik disini untuk menonton Anime dengan Subtitle Indonesia";
		}
	}

	function og_title()
	{
		$_this =& get_instance();
		global $SConfig;

		if ($_this->uri->segment(1) == 'nonton') 
		{
			return "Streaming Anime ".str_replace('_', ' ', $_this->uri->segment(3))." Subtitle Indonesia - ayystream.com";
		}
		else
		{
			return "Streaming Anime Subtitle Indonesia - ayystream.com";
		}
	}

	function title_admin()
	{
		$_this =& get_instance();
		global $SConfig;

		$array_backend_page = array
							(
								'' => 'Admin - AnimeStream Sub Indo',
								'dashboard' => 'Dashboard - AnimeStream Sub Indo',
								'anime' => 'Anime / Admin - AnimeStream Sub Indo',
								'laporan' => 'Laporan / Admin - AnimeStream Sub Indo',
								'pengurus' => 'Admin - AnimeStream Sub Indo',
							);
		$title = NULL;
		if (array_key_exists($_this->uri->segment(2), $array_backend_page)) 
		{
			return $array_backend_page[$_this->uri->segment(2)];
		}
	}

	function replace_str_lower($str)
	{
		$string = str_replace(' ', '_', $str);

		return strtolower($string);
	}

	function replace_str_upper($str)
	{
		$string = str_replace('_', ' ', $str);

		return strtoupper($string);
	}

	function replace_str_ga_penting($str)
	{
		$string = str_replace(str_split('\\/:;*?"<>|@$%^()+"\' '), '_', $str);

		$string = str_replace(str_split('.,'), '', $string);

		if (strstr($string, '&')) 
		{
		  return str_replace("&","and",$string);
		} 
		else 
		{
			$string = str_replace(str_split('()'), '', $string);
			return $string;
		}
	}

	function replace_kode_link($str)
	{
		$str1 = str_replace("https://drive.google.com/file/d/","",$str);
		$str2 = str_replace("/view?usp=sharing","",$str1);

		return $str2;
	}

	function get_kontrak($namakontrak)
	{
		global $SConfig;

		$fotopath = "./uploads/kontrak/".$namakontrak;
		return $SConfig->_site_url.str_replace("./", "/", $fotopath);
	}

	function get_keranjang_file($id_keranjang, $namafile)
	{
		global $SConfig;

		$fotopath = "./uploads/keranjang_upload/keranjang-".$id_keranjang.'/'.$namafile;
		return $SConfig->_site_url.str_replace("./", "/", $fotopath);
	}

	function get_foto_anime($namafoto)
	{
		global $SConfig;

		$fotopath = "./uploads/poster_anime/".$namafoto."*";
		$fotoinfo = glob($fotopath);
		$foton = $fotoinfo[0];

		return $SConfig->_site_url.str_replace("./", "/", $foton);
	}

	function get_foto_anime_saja($namafoto)
	{
		$fotopath = "./uploads/poster_anime/".$namafoto."*";
		$fotoinfo = glob($fotopath);
		$foton = $fotoinfo[0];

		return str_replace("./uploads/poster_anime/", "", $foton);
	}

	function get_foto_admin($namafoto)
	{
		global $SConfig;

		$fotopath = "./uploads/foto_admin/".$namafoto."*";
		$fotoinfo = glob($fotopath);
		$foton = $fotoinfo[0];

		return $SConfig->_site_url.str_replace("./", "/", $foton);
	}

	function get_foto_admin_saja($namafoto)
	{
		$fotopath = "./uploads/foto_admin/".$namafoto."*";
		$fotoinfo = glob($fotopath);
		$foton = $fotoinfo[0];

		return str_replace("./uploads/foto_admin/", "", $foton);
	}

	function get_foto_uploads_new_kontrak($namafoto)
	{
		global $SConfig;

		$fotopath = "./uploads/new_regist_kontrak/".$namafoto."*";
		$fotoinfo = glob($fotopath);
		$foton = $fotoinfo[0];

		return $SConfig->_site_url.str_replace("./", "/", $foton);
	}

	function get_foto_uploads_kontrak_dir($namafoto)
	{
		global $SConfig;

		$fotopath = "./uploads/kontrak/".$namafoto;

		$path = $SConfig->_document_root.str_replace("./", "/", $fotopath);
		return str_replace("/", "\\", $path);
	}

	function get_foto($namafoto)
	{
		global $SConfig;

		$fotopath = $namafoto;

		return $SConfig->_site_url.str_replace("./", "/", $fotopath);
	}

	function get_foto_assets($namafoto)
	{
		global $SConfig;

		$fotopath = "./assets/".$namafoto."*";
		$fotoinfo = glob($fotopath);
		$foton = $fotoinfo[0];

		return $SConfig->_site_url.str_replace("./", "/", $foton);
	}

	function get_foto_assets_admin($namafoto)
	{
		global $SConfig;

		$fotopath = "./public_style/admin/assets".$namafoto."*";
		$fotoinfo = glob($fotopath);
		$foton = $fotoinfo[0];

		return $SConfig->_site_url.str_replace("./", "/", $foton);
	}


	function longstr($str, $total)
	{
		$out = strlen($str) > $total ? substr($str,0,$total)."..." : $str;
		return $out;
	}

	//2018-01-09

	function mysqltodatepicker($date)
	{
		$tanggal = substr($date, 8);
		$bulan = substr($date, 5, 2);
		$tahun = substr($date, 0, 4);

		$datenew = $tanggal."/".$bulan."/".$tahun;

		return $datenew;
	}


	function tgl_ina($parameter, $bul=FALSE)
	{  //ini  untuk  mengubah  format  2015-06-15  ke  dalam format  15  Juni 2015
		$thn=substr($parameter,0,4);  //menngambil  4  digit  dari  kiri,  0  adalah  index  pertama  dari  tahun (angka 2 dari 2015), 4 banyaknya digit yg diambil
		$b=substr($parameter,5,2); //mengambil 2 digit, index 5 adalah angka 0 dari 06
		$tgl=substr($parameter,8,2); //mengambil 2 digit dari kanan
		if($b==1) {$bln="Januari";}
		else if($b==2) {$bln="Februari";}
		else if($b==3) {$bln="Maret";}
		else if($b==4) {$bln="April";}
		else if($b==5) {$bln="Mei";}
		else if($b==6) {$bln="Juni";}
		else if($b==7) {$bln="Juli";}
		else if($b==8) {$bln="Agustus";}
		else if($b==9) {$bln="September";}
		else if($b==10){$bln="Oktober";}
		else if($b==11){$bln="November";}
		else if($b==12){$bln="Desember";}
		$tanggal=$tgl . " ".$bln ." ".$thn;

		if ($bul == TRUE) 
		{
			return $bln;
		}
		else
		{
			return $tanggal;
		}
	}

	function tgl_ina2($parameter, $bul=FALSE)
	{  //ini  untuk  mengubah  format  2015-06-15  ke  dalam format  15  Juni 2015
		$thn=substr($parameter,0,4);  //menngambil  4  digit  dari  kiri,  0  adalah  index  pertama  dari  tahun (angka 2 dari 2015), 4 banyaknya digit yg diambil
		$b=substr($parameter,5,2); //mengambil 2 digit, index 5 adalah angka 0 dari 06
		$tgl=substr($parameter,-2); //mengambil 2 digit dari kanan
		if($b==1) {$bln="Jan";}
		else if($b==2) {$bln="Feb";}
		else if($b==3) {$bln="Mar";}
		else if($b==4) {$bln="Apr";}
		else if($b==5) {$bln="Mei";}
		else if($b==6) {$bln="Jun";}
		else if($b==7) {$bln="Jul";}
		else if($b==8) {$bln="Agu";}
		else if($b==9) {$bln="Sep";}
		else if($b==10){$bln="Okt";}
		else if($b==11){$bln="Nov";}
		else if($b==12){$bln="Des";}
		$tanggal=$tgl . " ".$bln ." ".$thn;

		if ($bul == TRUE) 
		{
			return $bln;
		}
		else
		{
			return $tanggal;
		}
	}

	function tgl_ina3($parameter)
	{  //ini  untuk  mengubah  format  2015-06-15  ke  dalam format  15  Juni 2015
		$thn=substr($parameter,0,4);  //menngambil  4  digit  dari  kiri,  0  adalah  index  pertama  dari  tahun (angka 2 dari 2015), 4 banyaknya digit yg diambil
		$b=substr($parameter,5,2); //mengambil 2 digit, index 5 adalah angka 0 dari 06
		$tgl=substr($parameter,-2); //mengambil 2 digit dari kanan
		if($b==1) {$bln="Jan";}
		else if($b==2) {$bln="Feb";}
		else if($b==3) {$bln="Mar";}
		else if($b==4) {$bln="Apr";}
		else if($b==5) {$bln="Mei";}
		else if($b==6) {$bln="Jun";}
		else if($b==7) {$bln="Jul";}
		else if($b==8) {$bln="Agust";}
		else if($b==9) {$bln="Sept";}
		else if($b==10){$bln="Okt";}
		else if($b==11){$bln="Nov";}
		else if($b==12){$bln="Des";}
		$tanggal=$tgl . " ".$bln ." ".$thn;

		return $tanggal." | ".substr($parameter, 11, 5);
	}

	function max_attribute_in_array($array, $prop) {
		    return max(array_map(function($o) use($prop) {
		                            return $o->$prop;
		                         },
		                         $array));
			}

	function cek_jawaban($no_jawab, $jawabex)
	{
		if ($no_jawab == $jawabex) 
		{
			return "checked";
		}
	}
	
		function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " Belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." Puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " Seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " Ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " Seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " Ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " Juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " Milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " Trilyun" . penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
 
	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}     		
		return $hasil;
	}

	function in_array_exist($array, $str)
	{
		if (in_array($str, $array)) 
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	function getDayIndonesia($date)
	    {
	        if($date != '0000-00-00'){
	            $data = hari(date('D', strtotime($date)));
	        }else{
	            $data = '-';
	        }
	  
	        return $data;
	    }
	  
	  
	    function hari($day) {
	        $hari = $day;
	  
	        switch ($hari) {
	            case "Sun":
	                $hari = "Minggu";
	                break;
	            case "Mon":
	                $hari = "Senin";
	                break;
	            case "Tue":
	                $hari = "Selasa";
	                break;
	            case "Wed":
	                $hari = "Rabu";
	                break;
	            case "Thu":
	                $hari = "Kamis";
	                break;
	            case "Fri":
	                $hari = "Jum'at";
	                break;
	            case "Sat":
	                $hari = "Sabtu";
	                break;
	        }
	        return $hari;
	    }
	    
function sendnotifall($title, $isi, $link = null)
{
	$content = array
      (
          "en" => $isi,
      );

  $fields = array(
      'app_id' => '6fbc7daf-d11d-42bf-a8fb-94b2a0f4ae19',
      'included_segments' => array(
          'Subscribed Users'
      ),
      'data' => array(
          "foo" => "bar"
      ),
      'contents' => $content,
      'headings' => array('en' => $title),
      "large_icon" => "https://desabanjarwaru.id/files/bnjr_trns.png",
      "url" => $link
  );
  
  $fields = json_encode($fields);
  
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json; charset=utf-8',
      'Authorization: Basic MDhlZTUwYmYtNmY5ZS00NWVmLThhNjEtOTljMzBhMGI2MWNk'
  ));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  curl_setopt($ch, CURLOPT_HEADER, FALSE);
  curl_setopt($ch, CURLOPT_POST, TRUE);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
  
  $response = curl_exec($ch);
  curl_close($ch);

  return $response;
}

function sendnotifid($idplayers, $title, $isi, $link = null){
  $content = array(
      "en" => $isi
      );
  
  $fields = array(
      'app_id' => '6fbc7daf-d11d-42bf-a8fb-94b2a0f4ae19',
      'include_player_ids' => $idplayers,
      'data' => array("foo" => "bar"),
      'contents' => $content,
      'headings' => array('en' => $title),
      "large_icon" => "https://desabanjarwaru.id/files/bnjr_trns.png",
      "url" => $link
  );
  
  $fields = json_encode($fields);
  
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  curl_setopt($ch, CURLOPT_HEADER, FALSE);
  curl_setopt($ch, CURLOPT_POST, TRUE);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

  $response = curl_exec($ch);
  curl_close($ch);
  
  return $response;
}