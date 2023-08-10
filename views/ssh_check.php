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
shell_exec("sudo -S /usr/local/bin/sshpass -p '!qaz2wsx' ssh root@172.16.15.113 ifconfig > /tmp/result99.txt");
echo "<br/>shell_exec end----------------------------------<br/>";

echo "<br/>cat start----------------------------------<br/>";
$rs99 = shell_exec("cat /tmp/result99.txt");
var_dump($rs99);
echo "<br/>cat end ----------------------------------<br/>";



$output2 = '';
$result2 = '';
exec("/usr/local/bin/sshpass -p '!qaz2wsx' ssh root@172.16.15.113 'ifconfig' " , $output2 , $result2);
print_r($result2);
print_r($output2);

?>
</body>