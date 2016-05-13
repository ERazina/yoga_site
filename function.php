<?php
	include_once "config.php";

	$db = mysqli_connect(HOST, USER, PASS, DB);
	mysqli_set_charset($db, "UTF8");
	function getHash() {
		$str  = 'abcdefghijklmnopqrstuvwxyz0123456789';
		$hash = '';
		
		for ($i = 0; $i < 32; $i++) {
			$hash.= $str[rand(0, 35)];
		}
		
		return $hash;
	}
	
	function getUser($flag = FALSE) {
		global $db;
		if (isset($_COOKIE['s']) AND isset($_COOKIE['t'])) {
			$session = $_COOKIE['s'];
			$token   = $_COOKIE['t'];
			$query   = mysqli_query($db, "
				SELECT `id` FROM `users`
				LEFT JOIN `connect` ON( `id` = `id_user` )
				WHERE `session` = '$session'
				AND   `token`   = '$token';
			");
			
			if (mysqli_num_rows($query) != 1) {
				$query = mysqli_query($db, "
					SELECT `id_user` FROM `connect`
					WHERE `session` = '$session';
				");
				
				setcookie('s', '');
				setcookie('t', '');
				
				if (mysqli_num_rows($query) != 0) {
					mysqli_query($db, "
						DELETE FROM `connect`
						WHERE `session` = '$session';
					");
				}
				if ($flag) header("Location: auth.php");
				else return array();
			}
			else {
				return mysqli_fetch_assoc($query);
			}
		}
		else {
			setcookie('s', '');
			setcookie('t', '');
			if ($flag) header('Location: index.php');
			else return array();
		}
	}
	
	function translit($str) {
		$arr = array(
			'а' => 'a', 
			'б' => 'b', 
			'в' => 'v', 
			'г' => 'g', 
			'д' => 'd', 
			'е' => 'e', 
			'ё' => 'io', 
			'ж' => 'j', 
			'з' => 'z', 
			'и' => 'i', 
			'й' => 'iy', 
			'к' => 'k', 
			'л' => 'l', 
			'м' => 'm', 
			'н' => 'n',
			'о' => 'o', 
			'п' => 'p',
			'р' => 'r',
			'с' => 's',
			'т' => 't',
			'у' => 'y',
			'ф' => 'f',
			'х' => 'h',
			'ц' => 'tc',
			'ч' => 'tch',
			'ш' => 'sh',
			'щ' => 'tsh',
			'ъ' => '',
			'ы' => 'ii',
			'ь' => '',
			'э' => 'ie',
			'ю' => 'u',
			'я' => 'ia',
		);
		$charset = mb_detect_encoding($str);
		$count   = mb_strlen($str, $charset);
		$new     = '';
		
		for ($i = 0; $i < $count; $i++) {
			$char = mb_substr($str, $i, 1, $charset);
			$new .= isset($arr[$char]) ? $arr[$char] : $char;
		}
		
		return $new;
	}
?>