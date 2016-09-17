<?php
include "class.pdf2text.php.php";
$filename = 'hasilmerge.txt';

$string = file_get_contents("hasilmerge.txt");
$token = strtok($string, " ");
while ($token !== false)
{
	$result .= '' . $token . "\r\n";
    echo "$token<br>";
    $token = strtok(" ");
}
file_put_contents($hasilmerge,$token);
//save file
$simpan = fopen('kamus_kata.txt', 'w');
fwrite($simpan, $result);
fclose($simpan);
unset($result, $simpan);
exit();

?>
