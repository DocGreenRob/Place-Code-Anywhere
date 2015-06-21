<?php

/**
 * @author Max Bond
 * 
 * Priority field data convert class
 *
 */
class aca_priority_conv extends _aca_data_conv {

	
	
	public function php2db($data) {
	
		if(!$data) return 100; else return $data;
	
	}
	
	public function db2php($data) {
	
		if(!$data) return ''; else return $data;
	
	}
	
	public function db2text($data) {
		
		if(!$data) return '-'; else return $data;
		
	}

}

?>