<?php
error_reporting(0);

$api = json_decode(file_get_contents("http://ip-api.com/json"),true);

$timezone=$api["timezone"];
$country=$api["country"];
$ip=$api["query"];
$isp=$api["isp"];

date_default_timezone_set($timezone);

function col($str,$color){
	$war=array('rw'=>"\033[107m\033[1;31m",'rt'=>"\033[106m\033[1;31m",'ht'=>"\033[0;30m",'p'=>"\033[1;37m",'a'=>"\033[1;30m",'m'=>"\033[1;31m",'h'=>"\033[1;32m",'k'=>"\033[1;33m",'b'=>"\033[1;34m",'u'=>"\033[1;35m",'c'=>"\033[1;36m",'rr'=>"\033[101m\033[1;37m",'rg'=>"\033[102m\033[1;34m",'ry'=>"\033[103m\033[1;30m",'rp1'=>"\033[104m\033[1;37m",'rp2'=>"\033[105m\033[1;37m");return $war[$color].$str."\033[0m";}

function ping($host, $port=80, $timeout=10) {
	$tB = microtime(true);
	$fP = fSockOpen($host, $port, $errno, $errstr, $timeout);
	if (!$fP) { return "down"; }
	$tA = microtime(true);
	return round((($tA - $tB)*10), 0)." ms";}
	
function Slow($msg){$slow = str_split($msg);
	foreach( $slow as $slowmo ){ echo $slowmo; usleep(10000);}}

$n = "\n";$n2 = "\n\n";$t = "\t";$r="\r                              \r";
system('clear');

echo Slow("\n".col("Script by ","h")."iewil \n");
echo Slow(col("Data ","h")."~> ".col("Your Cuntry","m")." ~> ".$country."\n");
echo Slow($t.col("Your ISP","m")." ~> ".$isp."\n");
echo Slow($t.col("Your Ip","m")." ~> ".$ip."\n\n");

$data = 'TesPing9Des2021';

$add = array(
	'google.com',
	'detik.com',
	'youtube.com',
	'stop'
	);
	
$address = current($add);

while(true){
	if($address == "stop"){
		echo str_repeat('~',55)."\n";
		$address=reset($add);
		}
		
		if(ping($address) == "down"){
		$base="[".date('H:i:s')."] ".$address." => Link Down \n";
		echo Slow(col("[".date('H:i:s')."] ","b").col('from','k').' '.col($address,'p').col(" time",'k').'='.col(ping($address)."\n",'m'));
		$file=fopen($data,"a");
		fwrite($file,$base);
		fclose($file);
		}else{
			echo Slow(col("[".date('H:i:s')."] ","b").col('from','k').' '.col($address,'p').col(" time",'k').'='.col(ping($address)."\n",'h'));
			}
		sleep(2);
		$address=next($add);
	}


