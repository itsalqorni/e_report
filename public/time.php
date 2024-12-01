<!-- <?php 

// function time_since ($original) {
//     date_default_timezone_set('asia/jakarta');
//     $chunks = array(
//         array(60 * 60 * 24 * 365 , 'tahun'),//koma "," adalah batas 
//         array(60 * 60 * 24 * 30 , 'bulan'),
//         array(60 * 60 * 24 , 'hari'),
//         array(60 * 60 , 'jam'),
//         array(60 , 'menit'),
//     );

//     $today = time();
//     $since = $today - $original;
//     //$today = buat realtime
//     //$original = waktu ngepost

//     if ($since < 604800) {
//         $print = date('m js', $original);//minggu
//         if ($since < 31536000); {
//             $print .= ', ' . date('Y', $original);//tahun
//         }
//         return $print;
//     }

//     for($i = 0, $j = count($chunks); $i < $j; $i++) {//count = menghitung
//         $seconds = $chunks[$i][0];//nomer
//         $name = $chunks[$i][1];//nama
//         if ($count = floor($since / $seconds)) {
//             break;
//         }
//     }

//     $print = ($count == 1) ? '1 ' . $name : "$count {$name}";//klo lebih besar dari 1 maka nampilin yang lbh besar

//     return $print . ' yang lalu'; 

// }


?> -->
<?php
function TimeAgo ($oldTime, $date) {//$oldTime = tanggal postingan dekeluarkan//date = waktu sekarang

	$tz = 'Asia/Jakarta';//zona waktu
	$dt = new DateTime("now", new DateTimeZone($tz));//waktu sekarang
	$date = $dt->format('Y-m-d H:i:s');//tampilan waktu


$timeCalc = strtotime($date) - strtotime($oldTime);// waktu sekarang di kurangi waktu postingan ,str(ing)
if ($timeCalc >= (60*60*24*30*12*2)){
	$timeCalc = intval($timeCalc/60/60/24/30/12) . " years ago";//Calculation (/'dibagi')
	}else if ($timeCalc >= (60*60*24*30*12)){
		$timeCalc = intval($timeCalc/60/60/24/30/12) . " year ago";
	}else if ($timeCalc >= (60*60*24*30*2)){
		$timeCalc = intval($timeCalc/60/60/24/30) . " months ago";
	}else if ($timeCalc >= (60*60*24*30)){
		$timeCalc = intval($timeCalc/60/60/24/30) . " month ago";
	}else if ($timeCalc >= (60*60*24*2)){
		$timeCalc = intval($timeCalc/60/60/24) . " days ago";
	}else if ($timeCalc >= (60*60*24)){
		$timeCalc = " Yesterday";
	}else if ($timeCalc >= (60*60*2)){
		$timeCalc = intval($timeCalc/60/60) . " hours ago";
	}else if ($timeCalc >= (60*60)){
		$timeCalc = intval($timeCalc/60/60) . " hour ago";
	}else if ($timeCalc >= 60*2){
		$timeCalc = intval($timeCalc/60) . " minutes ago";
	}else if ($timeCalc >= 60){
		$timeCalc = intval($timeCalc/60) . " minute ago";
	}else if ($timeCalc > 0){
		$timeCalc .= " seconds ago";
	}
return $timeCalc;
}
?>