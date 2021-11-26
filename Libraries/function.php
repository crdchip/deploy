<?php

	function postInput($string)
	{
		return isset($_POST[$string]) ? $_POST[$string] : ' ';
	};

	function getInput($string)
	{
		return isset($_GET[$string]) ? $_GET[$string] : ' ';
	};

//Redirect về các trang

	if(! function_exists('redirectAdmin')) 
	{
		# code...
		function redirectAdmin($url="")
		{
			header("location: ".base_url()."Admin/modules/category/{$url}");
				exit();
		}
	}

	function to_slug($str)
	{
		$str = trim(mb_strtolower($str));
		//Đổi ký tự có dấu thành không dấu
	    $slug = preg_replace('/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/', 'a', $str);
	    $slug = preg_replace('/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/', 'e', $str);
	    $slug = preg_replace('/i|í|ì|ỉ|ĩ|ị/', 'i', $str);
	    $slug = preg_replace('/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/', 'o', $str);
	    $slug = preg_replace('/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/', 'u', $str);
	    $slug = preg_replace('/ý|ỳ|ỷ|ỹ|ỵ/','y', $str);
	    $slug = preg_replace('/đ/','d',$str);
	    $slug = preg_replace('/[^a-z0-9-\s]/','',$str);
	    //Xóa các ký tự đặt biệt
	    $slug = preg_replace('/([\s]+)/', ' - ', $str);
	    return $str;
	}





		if ( ! function_exists('formatPrice'))
		{
		    // dinh dang lai gia tien
		    function formatPrice($number , $sale = 0)
		    {

		        $price = $sale != 0 ? $price = $number*(100 - $sale)/100  : $number;
		        return number_format($price, 0,',','.') ;
		    }

		}
		if ( ! function_exists('money'))
		{
		    // dinh dang lai gia tien
		    function money($number , $sale = 0)
		    {

		        $price = $sale != 0 ? $price = $number*(100 - $sale)/100  : $number;
		        return $price;
		    }
		}

		if( ! function_exists( 'baseServerName'))
		{
		    // duong dan url ban dau
		    function baseServerName()
		    {
		        return 'http://'.$_SERVER["SERVER_NAME"];
		    }
		}

		if ( ! function_exists('redirectUrl'))
		{
		    function redirectUrl($url = '')
		    {
		        header("location: ".baseServerName()."{$url}");exit();
		    }
		}

		if ( ! function_exists( 'curPageURL' ))
		{
		    /**
		     * @return string
		     * lay duong dan url hien tai
		     * VD
		     */
		    function curPageURL() {
		        $pageURL = "http";
		        $pageURL .= "://";
		        if ($_SERVER["SERVER_PORT"] != "80") {
		            $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		        } else {
		            $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		        }
		        return $pageURL;
		    }
		}

		function ColorFind($string,$fild)
		{
		    if($string != '')
		    {
		        return str_replace($string,"<span style='color:red;font-size:14px'>".$string."</span>",$fild);
		    }
		    else
		    {
		        return $fild;
		    }
		}
		if ( ! function_exists( 'createFolder' ))
		{
		 /**
		  *  Ham tao  thuc muc 
		  * return 0  => errors
		  * return 1  => success
		  *  tao moi thu muc
		 **/
		 function createFolder($path , $name)
		 {
		  $respons = 
		  [
		   'code' => 0,
		   'message' => ' Thư mục '.$name.' đã tồn tại ' 
		  ];
		  if(is_dir($path . $name))
		  {
		   return $respons;
		  }
		  $check_create = mkdir( $path . $name, 0777); 
		  if($check_create)
		  {
		   $respons['message']  =  ' Tạo thư mục thành công ';
		   $respons['code']  =  1;
		   return $respons;
		  }
		  $respons['message']  = ' Lỗi tạo thư mục';
		  return $respons;
		 }
		}

		if( ! function_exists( '' ))
		{
		 /**
		  *  xoa thu muc va file tong thu muc do 
		  */
		 function deleteFolder($dir = null) {
		    if (is_dir($dir)) {
		      $objects = scandir($dir);
		      foreach ($objects as $object) {
		         if ($object != "." && $object != "..")
		         {
		           if (filetype($dir."/".$object) == "dir") remove_dir($dir."/".$object);
		           else unlink($dir."/".$object);
		         }
		      }
		      reset($objects);
		      rmdir($dir);
		    }
		 }
		}

		if (!function_exists('get_start_and_time'))
		{
		    function get_start_and_time($date_range, $config=[])
		    {
		        $dates = explode(' - ', $date_range);

		        $start_date = date('Y-m-d', strtotime($dates[0]));
		        $end_date = date('Y-m-d', strtotime($dates[1]));

		        return [
		            'start' => $start_date,
		            'end' => $end_date
		        ];
		    }
		}
?>