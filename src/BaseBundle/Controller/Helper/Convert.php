<?php

namespace BaseBundle\Controller\Helper;

class Convert
{
	public static function translit($str) {
		$transtable = array ('�' => 'A', '�' => 'B', '�' => 'V', '�' => 'G', '�' => 'D', '�' => 'E', '�' => 'Yo', '�' => 'Zh', '�' => 'Z', '�' => 'I', '�' => 'Y', '�' => 'K', '�' => 'L', '�' => 'M', '�' => 'N', '�' => 'O', '�' => 'P', '�' => 'R', '�' => 'S', '�' => 'T', '�' => 'U', '�' => 'F', '�' => 'H', '�' => 'Ts', '�' => 'Ch', '�' => 'Sh', '�' => 'Shch', '�' => '', '�' => 'I', '�' => '', '�' => 'E', '�' => 'Yu', '�' => 'Ya', '�' => 'a', '�' => 'b', '�' => 'v', '�' => 'g', '�' => 'd', '�' => 'e', '�' => 'yo', '�' => 'zh', '�' => 'z', '�' => 'i', '�' => 'y', '�' => 'k', '�' => 'l', '�' => 'm', '�' => 'n', '�' => 'o', '�' => 'p', '�' => 'r', '�' => 's', '�' => 't', '�' => 'u', '�' => 'f', '�' => 'h', '�' => 'ts', '�' => 'ch', '�' => 'sh', '�' => 'shch', '�' => '', '�' => 'y', '�' => '', '�' => 'e', '�' => 'yu', '�' => 'ya');
		$str = strtr ( $str, $transtable );
		return $str;
	}
	
	public static function month_ru($timestamp) {
		setlocale(LC_TIME, "ru_RU.UTF-8");
		//$res = mb_convert_encoding(strftime('%B %Y', $timestamp), "UTF-8", "WINDOWS-1251");
		$res = strftime('%B %Y', $timestamp);
		$months = array(
			"January" => "������",
			"February" => "�������",
			"March" => "����",
			"April" => "������",
			"May" => "���",
			"June" => "����",
			"July" => "����",
			"August" => "������",
			"September" => "��������",
			"October" => "�������",
			"November" => "������",
			"December" => "�������"
		);
		return str_replace(array_keys($months), array_values($months), $res);
	}
}