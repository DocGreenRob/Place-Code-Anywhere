<?php

/**
 * @author Max Bond
 * 
 * aca Table system messages class
 * 
 * Uses sessions
 *
 */
class aca_table_sys_msg {
	
	
	
	public function __construct($msg) {
		
		if (!session_id()) @session_start(); // This will generate warning: 'Cannot send session cookie - headers already sent by' 

		if ($msg) $_SESSION['aca_table_sys_msg'][] = $msg;
		
	}
	
	public static function display() {

		$res = '';
	
		if (!session_id()) @session_start(); 
	
		if (arraY_key_exists('aca_table_sys_msg', $_SESSION) && is_array($_SESSION['aca_table_sys_msg'])) {
			
			$msgs = array_unique($_SESSION['aca_table_sys_msg']);

			unset($_SESSION['aca_table_sys_msg']);
			
		}  else {
			
			return false;
		
		}
			
		foreach ($msgs as $msg) {
			
			$res .= '<div class="updated fade"><p>'. $msg .'</p></div>'.PHP_EOL; // Standard WP sys msg style
			
		}
		
		return $res; 
		
	}
	
}

?>