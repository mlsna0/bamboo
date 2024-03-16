function  plus_date($date_in,$days_in)
{
//echo " Use function strtok to seperate year month day <br>";
$tok = strtok($date_in, "-");
$year = $tok ;
$tok  = strtok("-");
$month = $tok ;
$tok = strtok("-");
$day = $tok ;

$jd = gregoriantojd($month,$day,$year);
$jd = $jd+$days_in ;
$greg  = jdtogregorian($jd);

//echo  " Conver to mysql <BR> " ;
$tok = strtok($greg, "\/");
$month = $tok ;
if ($month < 10 )
   $month = "0".$month ;

$tok = strtok("\/");
$day = $tok ;
if ($day < 10 )
   $day = "0".$day ;

$tok  = strtok("\/");
$year = $tok ;

$next_date = $year."-".$month."-".$day ;
//echo " Next Date ".$next_date." <BR> <BR>";

return $next_date ;
}