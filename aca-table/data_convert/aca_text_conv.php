<?php

/**
 * @author Max Bond
 * 
 * Class for input text conversion
 *
 */
class aca_text_conv extends _aca_data_conv {

	
	
	public function php2db($data) {
	
		if(!$data) return 0; else return $data; 
	
	}
	
	public function db2php($data) {
	
		if(!$data) return ''; else return $data;
	
	}
	
}

?>