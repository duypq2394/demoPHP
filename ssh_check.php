<!DOCTYPE html>
<html lang="ja">

<head>
    <title>

    </title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
</head>

<body>
    <?php

$output = '';
$result = '';
echo "248 ipconfig command<br/>";
exec("sshpass -V" , $output , $result);
print_r($result);
print_r($output);
echo "<br/>1----------------------------------<br/>";

$output1 = '';
$result1 = '';
$output1 =  shell_exec("sshpass -V");
print_r($result1);
print_r($output1);
echo "<br/>2----------------------------------".time()."<br/>";
$rs1 = shell_exec("./ssh_check.sh");
sleep(1);
var_dump($rs1);
echo "<br/>3----------------------------------<br/>";

echo "<br/>cat----------------------------------<br/>";
$rs11 = shell_exec("cat /tmp/result.txt");

var_dump($rs11);

echo "<br/>shell_exec start----------------------------------<br/>";
shell_exec("sudo -S /usr/local/bin/sshpass -p '!qaz2wsx' ssh root@172.16.13.39 'ip a' > /tmp/result99.txt");
echo "<br/>shell_exec end----------------------------------<br/>";

echo "<br/>cat start----------------------------------<br/>";
$rs99 = shell_exec("cat /tmp/result99.txt");
var_dump($rs99);
echo "<br/>cat end ----------------------------------<br/>";



$output2 = '';
$result2 = '';
exec("/usr/local/bin/sshpass -p '!qaz2wsx' ssh root@172.16.13.39 'ip a' " , $output2 , $result2);
print_r($result2);
print_r($output2);
/* require_once('Components_Ssh.php');

$ssh = new Components_Ssh("172.20.1.68" , "root" , "!qaz2wsx" , "22" ,"");
echo "isConnected<br/>";

var_dump($ssh->isConnected());

echo "1<br/>";
$rs = $ssh->cmd("ifconfig",true);

var_dump($rs);

$ssh->shellCmd(array("ifconfig", "ip a | grep 172.16.15.118"));

echo "2<br/>";


$ssh->disconnect(); */


?>
</body>