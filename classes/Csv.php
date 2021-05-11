<?php 

/**
 * Class for manage CSV
 */

class Csv {

	function __construct($filename, $mode = 'w') {
		if ($mode != 'w' and $mode != 'a') {
			throw new Exception('CsvWriter only accepts "w" and "a" mode.');
		}
	
		$this->fileHandle = fopen($filename, $mode);
		
		if (!$this->fileHandle) {
			throw new Exception("Unable to open file $filename.");
		}
	}

	public function addLine(array $values) {
		try {
			fputcsv($this->fileHandle, $values);
			return 'added';	
		} catch (Exception $e) {
			echo 'Message:'.$e->getMessage();
		}
	}

	public function close() {
		if ($this->fileHandle) {
			fclose($this->fileHandle);
			$this->fileHandle = null;
		}
	}
} ?>