include('Snoopy.class.php');

$snoopy = new snoopy;
$snoopy -> fetch("html://info.kw.ac.kr/");
$txt = $snoopy->results;
print_r($txt);
