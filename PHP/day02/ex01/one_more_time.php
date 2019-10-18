#!/usr/bin/php
<?php
	function transform_in_uc($str) {
		return ucwords($str);
	}

	if ($argc == 2)
	{
		$valid = 0;
// 		Делаем каждую первую букву заглавной
		$str = transform_in_uc($argv[1]);
// 		Считаем колличество пробелов между словами в массиве (их должно быть 4)
		if (substr_count($str, ' ') == 4)
			$arr = explode(" " , $str);
		else {
			echo "Wrong Format\n";
			exit (1);
		}
// 		Создаем массивы с днем / месяцем
		$day = array(
        	"Monday" => "Lundi",
        	"Tuesday" => "Mardi",
        	"Wednesday" => "Mercredi",
        	"Thursday" => "Jeudi",
        	"Friday" => "Vendredi",
        	"Saturday" => "Samedi",
        	"Sunday" => "Dimanche");
        $month = array(
        	"1" => "Janvier",
        	"2" => "Fevrier",
        	"3" => "Mars",
        	"4" => "Avril",
        	"5" => "Mai",
        	"6" => "Juin",
        	"7" => "Juillet",
        	"8" => "Aout",
        	"9" => "Septembre",
        	"10" => "Octobre",
        	"11" => "Novembre",
        	"12" => "Decembre");
//      Валидируем дату
        if (in_array($arr[0], $day))
        	$valid += 1;
        if (preg_match("/^(([0-3]){1}([0-9]){1}|([1-9]){1})$/", $arr[1]) &&
            		$arr[1] > 0 && $arr[1] < 32)
        	$valid += 1;
        if (in_array($arr[2], $month))
        	$valid += 1;
        if (preg_match("/^([0-9]){4}$/", $arr[3]) && $arr[3] > 1969)
        	$valid += 1;
        $time = explode(":", "$arr[4]");
        if (count($time) != 3) {
        	echo "Wrong Format\n";
        	exit(1);
        }
        if ((preg_match("/^([0-9]){2}$/", $time[0]) && $time[0] >= 0 && $time[0] < 24) &&
        	(preg_match("/^([0-9]){2}$/", $time[1]) && $time[1] >= 0 && $time[1] < 60) &&
        	(preg_match("/^([0-9]){2}$/", $time[2]) && $time[2] >= 0 && $time[2] < 60))
        	$valid++;
//      Если значение $valid != 5 , то наша дата невалидна
        if ($valid != 5) {
        	echo "Wrong Format\n";
        	exit (1);
        }
//      Конвертируем нашу дату в юлианскую
		$new_date = cal_to_jd(CAL_GREGORIAN, array_search($arr[2], $month), $arr[1], $arr[3]);
// 		Проверяем дату и высчитываем конечный результат
		if (jddayofweek($new_date, 1) == array_search($arr[0], $day))
		{
			$conct .= $arr[3] . '-' . array_search($arr[2], $month) . '-' . $arr[1] . ' ' . $arr[4];
			date_default_timezone_set('GMT');
			$time2 = strtotime($conct);
			$time1 = strtotime("1970-01-01 01:00:00");
			$diff = $time2 - $time1;
			echo $diff . "\n";
		}
		else {
			echo "Wrong Format\n";
			exit(1);
		}
	}
?>