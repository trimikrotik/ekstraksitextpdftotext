<?php
	$files = glob("./*.txt");
	$out = fopen("hasilmerge.txt", "w");
	foreach($files as $file)
	{
    	fwrite($out, file_get_contents($file));
	}
	fclose($out);
?>
