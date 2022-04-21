<?php
$fileHandle = fopen($argv[1], "r"); // open search file
$index = $argv[2]; 			// read column index for searching
$search = $argv[3];			// read search value
$found = false;
//Loop through the CSV file. 
while (($row = fgetcsv($fileHandle, 0, ",")) !== FALSE) { 
    if(count($row) == 1 && empty($row[0])){
        //Blank line detected.
        continue;
    }
    if ($row[$index] == $search) 
	{
    	echo implode(",",$row);
	echo "\r\n";
    	$found = true;
	}
}
if (!$found)
echo "No results found!"
?>