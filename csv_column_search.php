<?php
if (count($argv) < 2){
	echo "No arguments passed!";
}
else {
	try
	{
 		if ( !file_exists($argv[1]) ) {
		throw new Exception('File not found.');
 		 }
    		$fileHandle = fopen($argv[1], "r");

		if ( !is_numeric($argv[2]) ) {
		throw new Exception('Please enter valid index');
 		 }
		$index = $argv[2]; // read column index for searching

		if(empty($argv[3])){
		throw new Exception('Please enter search value');
 		 }
		$search = $argv[3];			// read search value

		$found = false;
		//Loop through the CSV file. 
		while (($row = fgetcsv($fileHandle, 0, ",")) !== FALSE) { 
    			if($argv[2] >= count($row) || $argv[2] < 0  ){
       		 throw new Exception('Please enter a valid index');
    			}
    			if ($row[$index] == $search) 
			{
    			echo implode(",",$row);
			echo "\r\n";
    			$found = true;
			}
		}
		if (!$found)
		echo "No results found!";

		fclose($fileHandle);

	}
	catch (Exception $error)
	{
   	 echo "Error! " . $error->getMessage();
	}


}
?>
