<?php
//------------Start-------------//
header("cache-control:no-cache,must-revalidate");
header("Content-Type:text/html;charset=UTF-8");
header("Accept-Ranges: bytes");
header('Content-Disposition: attachment; filename='.'Surge.Conf');
//-------------接收-------------//
if( isset($_GET['Logo']) ){$Logo = $_GET['Logo'];  }else {$Logo = "true";}
if( isset($_GET['Protocol']) ){$Protocol = $_GET['Protocol'];  }else {$Protocol = "custom";}
if( isset($_GET['AutoGroup']) ){$AutoGroup = $_GET['AutoGroup'];}else {$Rule = "false";}
if( $AutoGroup=="true" ){$GETAutoGroup="true";}elseif($AutoGroup=="false"){$GETAutoGroup="false";}elseif($AutoGroup=="select"){$GETAutoGroup="select";}else {$GETAutoGroup="false";}
if( isset($_GET['Rule']) ){$Rule = $_GET['Rule'];}else {$Rule = "false";}
if( $Rule=="true" ){$Rule="true";}elseif ($Rule=="false"){$Rule="false";}else {$Apple="false";}
if( isset($_GET['Apple']) ){$Apple = $_GET['Apple'];}else {$Apple = "false";}
if( $Apple=="true" ){$GETApple="Proxy";}elseif ($Apple=="false"){$GETApple="DIRECT";}else {$GETApple="DIRECT";}
if( isset($_GET['IPV6']) ){$IPV6 = $_GET['IPV6'];}else {$IPV6 = "false";}
if( $IPV6=="true" ){$IPV6="true";}elseif($IPV6=="false"){$IPV6="false";}else {$IPV6="false";}
if( isset($_GET['Group']) ){$Group = $_GET['Group'];}else {$Group = "1";}
if( isset($_GET['DNS1']) ){$DNS1 = $_GET['DNS1'];}else {$DNS1 = "8.8.8.8";}
if( isset($_GET['DNS2']) ){$DNS2 = $_GET['DNS2'];}else {$DNS2 = "8.8.4.4";}
if( isset($_GET['Config1']) ){$Config1 = $_GET['Config1'];}else {$Config1 = "127.0.0.1,80,aes-256-cfb,Password";}
if( isset($_GET['Config2']) ){$Config2 = $_GET['Config2'];}else {$Config2 = "127.0.0.1,80,aes-256-cfb,Password";}
if( isset($_GET['Config3']) ){$Config3 = $_GET['Config3'];}else {$Config3 = "127.0.0.1,80,aes-256-cfb,Password";}
if( isset($_GET['Config4']) ){$Config4 = $_GET['Config4'];}else {$Config4 = "127.0.0.1,80,aes-256-cfb,Password";}
if( isset($_GET['Config5']) ){$Config5 = $_GET['Config5'];}else {$Config5 = "127.0.0.1,80,aes-256-cfb,Password";}
if( isset($_GET['Flag1']) ){$Flag1 = $_GET['Flag1'];  }else {$Flag1 = "NONE1";}
if( isset($_GET['Flag2']) ){$Flag2 = $_GET['Flag2'];  }else {$Flag2 = "NONE2";}
if( isset($_GET['Flag3']) ){$Flag3 = $_GET['Flag3'];  }else {$Flag3 = "NONE3";}
if( isset($_GET['Flag4']) ){$Flag4 = $_GET['Flag4'];  }else {$Flag4 = "NONE4";}
if( isset($_GET['Flag5']) ){$Flag5 = $_GET['Flag5'];  }else {$Flag5 = "NONE5";}
//-------------通用-------------//
$NAME = "CloudGate";        //名称
$Module = "http://7xpphx.com1.z0.glb.clouddn.com/Proxy/Surge.Module"; //Module
//-------------文件-------------//
$DefaultFile = "http://7xpphx.com1.z0.glb.clouddn.com/Proxy/File/Default.txt";
$DefaultFile  = $DefaultFile . '?Sign='.sha1(mt_rand()).'&TimeStamp='.time();
$Default = fopen($DefaultFile,"r");
//Proxy Rule | if Rule=null>Advanced | if Rule=false>Advanced | if Rule=true>Basic |
if ($Rule=="true"){$ProxyFile = "http://7xpphx.com1.z0.glb.clouddn.com/Proxy/File/Basic.txt";}
elseif ($Rule=="false"){$ProxyFile = "http://7xpphx.com1.z0.glb.clouddn.com/Proxy/File/Advanced.txt";} 
$ProxyFile  = $ProxyFile . '?Sign='.sha1(mt_rand()).'&TimeStamp='.time();
$Proxy = fopen($ProxyFile,"r");
$DIRECTFile = "http://7xpphx.com1.z0.glb.clouddn.com/Proxy/File/DIRECT.txt";
$DIRECTFile  = $DIRECTFile . '?Sign='.sha1(mt_rand()).'&TimeStamp='.time();
$DIRECT = fopen($DIRECTFile,"r");
$REJECTFile = "http://7xpphx.com1.z0.glb.clouddn.com/Proxy/File/REJECT.txt";
$REJECTFile  = $REJECTFile . '?Sign='.sha1(mt_rand()).'&TimeStamp='.time();
$REJECT = fopen($REJECTFile,"r");
$KEYWORDFile = "http://7xpphx.com1.z0.glb.clouddn.com/Proxy/File/KEYWORD.txt";
$KEYWORDFile  = $KEYWORDFile . '?Sign='.sha1(mt_rand()).'&TimeStamp='.time();
$KEYWORD = fopen($KEYWORDFile,"r");
$IPCIDRFile = "http://7xpphx.com1.z0.glb.clouddn.com/Proxy/File/IPCIDR.txt";
$IPCIDRFile  = $IPCIDRFile . '?Sign='.sha1(mt_rand()).'&TimeStamp='.time();
$IPCIDR = fopen($IPCIDRFile,"r");
$RewriteFile = "http://7xpphx.com1.z0.glb.clouddn.com/Proxy/File/Rewrite.txt";
$RewriteFile  = $RewriteFile . '?Sign='.sha1(mt_rand()).'&TimeStamp='.time();
$Rewrite = fopen($RewriteFile,"r");
//--------------配置------------//
echo "#!MANAGED-CONFIG http://UPlus7.Win/Advanced/Surge.php?AutoGroup=$AutoGroup&Rule=$Rule&Apple=$Apple&IPV6=$IPV6&Group=$Group&Config1=$Config1&Config2=$Config2&Config3=$Config3&Config4=$Config4&Config5=$Config5&Flag1=$Flag1&Flag2=$Flag2&Flag3=$Flag3&Flag4=$Flag4&Flag5=$Flag5&Protocol=$Protocol interval=86400\r\n";
echo "[General]\r\n";
echo "bypass-system = true\r\n";
echo "skip-proxy = 10.0.0.0/8, 17.0.0.0/8, 172.16.0.0/12, 192.168.0.0/16, localhost, *.local, ::ffff:0:0:0:0/1, ::ffff:128:0:0:0/1, *.crashlytics.com, *.helpshift.com, *.supercell.net\r\n";
//echo "bypass-tun = 0.0.0.0/8, 1.0.0.0/9, 1.160.0.0/11, 1.192.0.0/11, 10.0.0.0/8, 14.0.0.0/11, 14.96.0.0/11, 14.128.0.0/11, 14.192.0.0/11, 27.0.0.0/10, 27.96.0.0/11, 27.128.0.0/9, 36.0.0.0/10, 36.96.0.0/11, 36.128.0.0/9, 39.0.0.0/11, 39.64.0.0/10, 39.128.0.0/10, 42.0.0.0/8, 43.224.0.0/11, 45.64.0.0/10, 47.64.0.0/10, 49.0.0.0/9, 49.128.0.0/11, 49.192.0.0/10, 54.192.0.0/11, 58.0.0.0/9, 58.128.0.0/11, 58.192.0.0/10, 59.32.0.0/11, 59.64.0.0/10, 59.128.0.0/9, 60.0.0.0/10, 60.160.0.0/11, 60.192.0.0/10, 61.0.0.0/10, 61.64.0.0/11, 61.128.0.0/10, 61.224.0.0/11, 100.64.0.0/10, 101.0.0.0/9, 101.128.0.0/11, 101.192.0.0/10, 103.0.0.0/10, 103.192.0.0/10, 106.0.0.0/9, 106.224.0.0/11, 110.0.0.0/7, 112.0.0.0/9, 112.128.0.0/11, 112.192.0.0/10, 113.0.0.0/9, 113.128.0.0/11, 113.192.0.0/10, 114.0.0.0/9, 114.128.0.0/11, 114.192.0.0/10, 115.0.0.0/8, 116.0.0.0/8, 117.0.0.0/9, 117.128.0.0/10, 118.0.0.0/11, 118.64.0.0/10, 118.128.0.0/9, 119.0.0.0/9, 119.128.0.0/10, 119.224.0.0/11, 120.0.0.0/10, 120.64.0.0/11, 120.128.0.0/11, 120.192.0.0/10, 121.0.0.0/9, 121.192.0.0/10, 122.0.0.0/7, 124.0.0.0/8, 125.0.0.0/9, 125.160.0.0/11, 125.192.0.0/10, 127.0.0.0/8, 139.0.0.0/11, 139.128.0.0/9, 140.64.0.0/11, 140.128.0.0/11, 140.192.0.0/10, 144.0.0.0/10, 144.96.0.0/11, 144.224.0.0/11, 150.0.0.0/11, 150.96.0.0/11, 150.128.0.0/11, 150.192.0.0/10, 152.96.0.0/11, 153.0.0.0/10, 153.96.0.0/11, 157.0.0.0/10, 157.96.0.0/11, 157.128.0.0/11, 157.224.0.0/11, 159.224.0.0/11, 161.192.0.0/11, 162.96.0.0/11, 163.0.0.0/10, 163.96.0.0/11, 163.128.0.0/10, 163.192.0.0/11, 166.96.0.0/11, 167.128.0.0/10, 167.192.0.0/11, 168.160.0.0/11, 169.254.0.0/16, 171.0.0.0/9, 171.192.0.0/11, 172.16.0.0/12, 175.0.0.0/9, 175.128.0.0/10, 180.64.0.0/10, 180.128.0.0/9, 182.0.0.0/8, 183.0.0.0/10, 183.64.0.0/11, 183.128.0.0/9, 192.0.0.0/24, 192.0.2.0/24, 192.88.99.0/24, 192.96.0.0/11, 192.160.0.0/11, 198.18.0.0/15, 198.51.100.0/24, 202.0.0.0/9, 202.128.0.0/10, 202.192.0.0/11, 203.0.0.0/9, 203.128.0.0/10, 203.192.0.0/11, 210.0.0.0/10, 210.64.0.0/11, 210.160.0.0/11, 210.192.0.0/11, 211.64.0.0/10, 211.128.0.0/10, 218.0.0.0/9, 218.160.0.0/11, 218.192.0.0/10, 219.64.0.0/11, 219.128.0.0/11, 219.192.0.0/10, 220.96.0.0/11, 220.128.0.0/9, 221.0.0.0/11, 221.96.0.0/11, 221.128.0.0/9, 222.0.0.0/8, 223.0.0.0/11, 223.64.0.0/10, 223.128.0.0/9\r\n";
if($Logo=="true"){echo "bypass-tun = 10.0.0.0/8, 127.0.0.0/24, 172.0.0.0/8, 192.168.0.0/16\r\n";}
elseif($Logo=="false"){echo "bypass-tun = 0.0.0.0/8, 10.0.0.0/8, 127.0.0.0/24, 172.0.0.0/8, 192.168.0.0/16\r\n";}}
else{echo "bypass-tun = 10.0.0.0/8, 127.0.0.0/24, 172.0.0.0/8, 192.168.0.0/16\r\n";}
if($DNS1){echo "dns-server = $DNS1, $DNS2\r\n";}
elseif($DNS1 != NULL && $DNS2 != NULL){echo "dns-server = 8.8.8.8, 8.8.4.4\r\n";}
else{echo "dns-server = 8.8.8.8, 8.8.4.4\r\n";}
echo "loglevel = notify\r\n";
echo "replica = false\r\n";
echo "ipv6 = $IPV6\r\n";
echo "#  \r\n";
echo "# Surge Config File [$NAME]\r\n";
echo "# Last Modified: " . date("Y-m-d H:i:s") . "\r\n";
echo "# \r\n";
echo "[Proxy]\r\n";
if ($Group<"2"){
echo "$Flag1 = $Protocol,$Config1,$Module\r\n";}
elseif ($Group<"3"){
echo "$Flag1 = $Protocol,$Config1,$Module\r\n";
echo "$Flag2 = $Protocol,$Config2,$Module\r\n";}
elseif ($Group<"4"){
echo "$Flag1 = $Protocol,$Config1,$Module\r\n";
echo "$Flag2 = $Protocol,$Config2,$Module\r\n";
echo "$Flag3 = $Protocol,$Config3,$Module\r\n";}
elseif ($Group<"5"){
echo "$Flag1 = $Protocol,$Config1,$Module\r\n";
echo "$Flag2 = $Protocol,$Config2,$Module\r\n";
echo "$Flag3 = $Protocol,$Config3,$Module\r\n";
echo "$Flag4 = $Protocol,$Config4,$Module\r\n";}
elseif ($Group<"6"){
echo "$Flag1 = $Protocol,$Config1,$Module\r\n";
echo "$Flag2 = $Protocol,$Config2,$Module\r\n";
echo "$Flag3 = $Protocol,$Config3,$Module\r\n";
echo "$Flag4 = $Protocol,$Config4,$Module\r\n";
echo "$Flag5 = $Protocol,$Config5,$Module\r\n";}
elseif ($Group>"6"){
echo "$Flag1 = $Protocol,$Config1,$Module\r\n";}
else {
echo "$Flag1 = $Protocol,$Config1,$Module\r\n";}
echo "[Proxy Group]\r\n";
if ($GETAutoGroup=="true"){}
elseif($GETAutoGroup=="false"){
if ($Group<"2"){echo "Proxy = select, $Flag1\r\n";}
elseif ($Group<"3"){echo "Proxy = select, $Flag1, $Flag2\r\n";}
elseif ($Group<"4"){echo "Proxy = select, $Flag1, $Flag2, $Flag3\r\n";}
elseif ($Group<"5"){echo "Proxy = select, $Flag1, $Flag2, $Flag3, $Flag4\r\n";}
elseif ($Group<"6"){echo "Proxy = select, $Flag1, $Flag2, $Flag3, $Flag4, $Flag5\r\n";}
elseif ($Group>"6"){echo "Proxy = select, $Flag1\r\n";}}
elseif($GETAutoGroup=="select"){
if ($Group<"2"){echo "Auto = select, AutoGroup, $Flag1\r\n";}
elseif ($Group<"3"){echo "Auto = select, AutoGroup, $Flag1, $Flag2\r\n";}
elseif ($Group<"4"){echo "Auto = select, AutoGroup, $Flag1, $Flag2, $Flag3\r\n";}
elseif ($Group<"5"){echo "Auto = select, AutoGroup, $Flag1, $Flag2, $Flag3, $Flag4\r\n";}
elseif ($Group<"6"){echo "Auto = select, AutoGroup, $Flag1, $Flag2, $Flag3, $Flag4, $Flag5\r\n";}
elseif ($Group>"6"){echo "Auto = select, $Flag1\r\n";}}
else {echo "Proxy = select, $Flag1\r\n";}
//AutoGroup | if AntoGroup=null>false | if AutoGroup=false>false | if AutoGroup=true>true |
if ($GETAutoGroup=="true"){
if ($Group<"2"){echo "AutoGroup = url-test, $Flag1, url = http://www.gstatic.com/generate_204, interval = 600, tolerance = 200, timeout = 5\r\n";}
elseif ($Group<"3"){echo "AutoGroup = url-test, $Flag1, $Flag2, url = http://www.gstatic.com/generate_204, interval = 600, tolerance = 200, timeout = 5\r\n";}
elseif ($Group<"4"){echo "AutoGroup = url-test, $Flag1, $Flag2, $Flag3, url = http://www.gstatic.com/generate_204, interval = 600, tolerance = 200, timeout = 5\r\n";}
elseif ($Group<"5"){echo "AutoGroup = url-test, $Flag1, $Flag2, $Flag3, $Flag4, url = http://www.gstatic.com/generate_204, interval = 600, tolerance = 200, timeout = 5\r\n";}
elseif ($Group<"6"){echo "AutoGroup = url-test, $Flag1, $Flag2, $Flag3, $Flag4, $Flag5, url = http://www.gstatic.com/generate_204, interval = 600, tolerance = 200, timeout = 5\r\n";}}
if ($GETAutoGroup=="select"){
if ($Group<"2"){echo "AutoGroup = url-test, $Flag1, url = http://www.gstatic.com/generate_204, interval = 600, tolerance = 200, timeout = 5\r\n";}
elseif ($Group<"3"){echo "AutoGroup = url-test, $Flag1, $Flag2, url = http://www.gstatic.com/generate_204, interval = 600, tolerance = 200, timeout = 5\r\n";}
elseif ($Group<"4"){echo "AutoGroup = url-test, $Flag1, $Flag2, $Flag3, url = http://www.gstatic.com/generate_204, interval = 600, tolerance = 200, timeout = 5\r\n";}
elseif ($Group<"5"){echo "AutoGroup = url-test, $Flag1, $Flag2, $Flag3, $Flag4, url = http://www.gstatic.com/generate_204, interval = 600, tolerance = 200, timeout = 5\r\n";}
elseif ($Group<"6"){echo "AutoGroup = url-test, $Flag1, $Flag2, $Flag3, $Flag4, $Flag5, url = http://www.gstatic.com/generate_204, interval = 600, tolerance = 200, timeout = 5\r\n";}}
elseif ($GETAutoGroup=="false"){}
//--------------模块------------//
//Default
if($Default){
echo "[Rule]";
echo"\r\n# Default\r\n";
while(!feof($Default))
{
if($GETAutoGroup=="true"){echo trim(fgets($Default)).",AutoGroup"."\r\n"; }
elseif($GETAutoGroup=="select"){echo trim(fgets($Default)).",Auto"."\r\n"; }
elseif($GETAutoGroup=="false"){echo trim(fgets($Default)).",$GETApple"."\r\n"; }
else {echo trim(fgets($Default)).",$GETApple"."\r\n"; }
}
{
fclose($Default);
}
}else {
  echo "\r\n# Default Module下载失败!\r\n";
}
//PROXY
if($Proxy){
echo"# PROXY\r\n";
while(!feof($Proxy))
{
if($GETAutoGroup=="true"){echo trim(fgets($Proxy)).",AutoGroup"."\r\n"; }
elseif($GETAutoGroup=="select"){echo trim(fgets($Proxy)).",Auto"."\r\n"; }
elseif($GETAutoGroup=="false"){echo trim(fgets($Proxy)).",Proxy"."\r\n"; }
else{echo trim(fgets($Proxy)).",Proxy"."\r\n"; }
}
{
fclose($Proxy);
}
}else {
  echo "\r\n# Proxy Module下载失败!\r\n";
}
//DIRECT
if($DIRECT){
echo"# DIRECT\r\n";
while(!feof($DIRECT))
{
echo trim(fgets($DIRECT)).",DIRECT"."\r\n"; 
}
{
fclose($DIRECT);
}
}else {
  echo "\r\n# DIRECT Module下载失败!\r\n";
}
//REJECT
if($REJECT){
echo"\r\n# REJECT\r\n";
while(!feof($REJECT))
{
echo trim(fgets($REJECT)).",REJECT"."\r\n"; 
}
{
fclose($REJECT);
}
}else {
  echo "\r\n# REJECT Module下载失败!\r\n";
}
//KEYWORD
if($KEYWORD){
echo"# KEYWORD\r\n";
while(!feof($KEYWORD))
{
if($GETAutoGroup=="true"){echo str_replace("Proxy","AutoGroup","DOMAIN-KEYWORD,".trim(fgets($KEYWORD)).",force-remote-dns"."\r\n"); }
elseif($GETAutoGroup=="select"){echo str_replace("Proxy","Auto","DOMAIN-KEYWORD,".trim(fgets($KEYWORD)).",force-remote-dns"."\r\n"); }
elseif($GETAutoGroup=="false"){echo "DOMAIN-KEYWORD,".trim(fgets($KEYWORD)).",force-remote-dns"."\r\n"; }
else{echo "DOMAIN-KEYWORD,".trim(fgets($KEYWORD)).",force-remote-dns"."\r\n"; }
}
{
fclose($KEYWORD);
}
}else {
  echo "\r\n# KEYWORD Module下载失败!\r\n";
}
//IPCIDR
if($IPCIDR){
echo"# IP-CIDR\r\n";
while(!feof($IPCIDR))
{
if($GETAutoGroup=="true"){echo str_replace("Proxy","AutoGroup","IP-CIDR,".trim(fgets($IPCIDR)).",no-resolve"."\r\n"); }
elseif($GETAutoGroup=="select"){echo str_replace("Proxy","Auto","IP-CIDR,".trim(fgets($IPCIDR)).",no-resolve"."\r\n"); }
elseif($GETAutoGroup=="false"){echo "IP-CIDR,".trim(fgets($IPCIDR)).",no-resolve"."\r\n"; }
else{echo "IP-CIDR,".trim(fgets($IPCIDR)).",no-resolve"."\r\n"; }
}
{
fclose($IPCIDR);
}
}else {
  echo "\r\n# IPCIDR Module下载失败!\r\n";
}
//Other
echo"# Other\r\n";
echo"GEOIP,CN,DIRECT\r\n";
if($GETAutoGroup=="true"){echo"FINAL,AutoGroup";}
elseif($GETAutoGroup=="select"){echo"FINAL,Auto";}
elseif($GETAutoGroup=="false"){echo"FINAL,Proxy";}
else{echo"FINAL,Proxy";}
//Rewrite
if($Rewrite){
echo"\r\n# Rewrite\r\n";
echo"[URL Rewrite]\r\n";
while(!feof($Rewrite))
{
echo fgets($Rewrite)."";
}
{
fclose($Rewrite);
}
}else {
  echo "\r\n# Rewrite Module下载失败!\r\n";
}
exit();
//--------------END-------------//