<?php

	function get_template_directory($path)
	{
		return base_url()."public_style/".$path;
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

	function get_foto($namafoto)
	{
		global $SConfig;

		$fotopath = $namafoto;

		return $SConfig->_site_url.str_replace("./", "/", $fotopath);
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

	function get_ext($data)
	{
		$array = explode(".",$data);

		$lastKey = key(array_slice($array, -1, 1, true));
		return $array[$lastKey];
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

	function generate_otp()
	{
		$num_str = sprintf("%06d", mt_rand(1, 999999));
	    	return $num_str;
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

	function ip_10menit($date)
	{
		$str = "+ 10 minutes";
		return date('Y-m-d H:i:s', strtotime($str, strtotime($date)));
	}

	function plusmonth($date)
	{
		$str = "+ 30 days";
		return date('Y-m-d H:i:s', strtotime($str, strtotime($date)));
	}

	function plusmonthsatu($date)
	{
		$str = "+ 1 month";
		return date('Y-m-d', strtotime($str, strtotime($date)));
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

	function tgl_en($parameter)
	{  //ini  untuk  mengubah  format  2015-06-15  ke  dalam format  15  Juni 2015
		$thn=substr($parameter,0,4);  //menngambil  4  digit  dari  kiri,  0  adalah  index  pertama  dari  tahun (angka 2 dari 2015), 4 banyaknya digit yg diambil
		$b=substr($parameter,5,2); //mengambil 2 digit, index 5 adalah angka 0 dari 06
		$tgl=substr($parameter,8,2); //mengambil 2 digit dari kanan
		if($b==1) {$bln="Jan";}
		else if($b==2) {$bln="Feb";}
		else if($b==3) {$bln="Mar";}
		else if($b==4) {$bln="Apr";}
		else if($b==5) {$bln="May";}
		else if($b==6) {$bln="Jun";}
		else if($b==7) {$bln="Jul";}
		else if($b==8) {$bln="Aug";}
		else if($b==9) {$bln="Sep";}
		else if($b==10){$bln="Oct";}
		else if($b==11){$bln="Nov";}
		else if($b==12){$bln="Dec";}
		$tanggal=$tgl . " ".$bln ." ".$thn;
		return $tanggal;
	}

	function max_attribute_in_array($array, $prop) {
		    return max(array_map(function($o) use($prop) {
		                            return $o->$prop;
		                         },
		                         $array));
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

function split_name($name) {
    $parts = array();

    while ( strlen( trim($name)) > 0 ) {
        $name = trim($name);
        $string = preg_replace('#.*\s([\w-]*)$#', '$1', $name);
        $parts[] = $string;
        $name = trim( preg_replace('#'.preg_quote($string,'#').'#', '', $name ) );
    }

    if (empty($parts)) {
        return false;
    }

    $parts = array_reverse($parts);
    $name = array();
    $name['first_name'] = $parts[0];
    $name['middle_name'] = (isset($parts[2])) ? $parts[1] : '';
    $name['last_name'] = (isset($parts[2])) ? $parts[2] : ( isset($parts[1]) ? $parts[1] : '');
    
    return $name;
}

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function get_years_old($birthDate)
{
  	$currentDate = date("Y-m-d");

	$age = date_diff(date_create($birthDate), date_create($currentDate));
	return $age->format("%y");
}