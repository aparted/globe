<?php
phpinfo();
/*function cidr_match($ip, $ranges)
{
    $ranges = (array)$ranges;
    foreach($ranges as $range) {
        list($subnet, $mask) = explode('/', $range);
        if((ip2long($ip) & ~((1 << (32 - $mask)) - 1)) == ip2long($subnet)) {
            return true;
        }
    }
    return false;
}
 
$github_ips = array('207.97.227.253', '50.57.128.197', '108.171.174.178', '50.57.231.61');
$github_cidrs = array('192.30.252.0/22', '192.30.252.0/22');
 
if(in_array($_SERVER['REMOTE_ADDR'], $github_ips) || cidr_match($_SERVER['REMOTE_ADDR'], $github_cidrs)) {
    $dir = '/var/www/html/seminar';
    exec("cd $dir && git pull");
    echo 'Done.';
}
else {
    header('HTTP/1.1 404 Not Found');
    echo '404 Not Found.';
    exit;
}*/

$dir = '/var/www/html/seminar';

//echo exec('whoami');
echo exec("cd $dir");
echo exec("sudo git pull");
//if() echo 'Done.';
?>