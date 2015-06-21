<?php

/**
 * @author Max Bond
 * 
 * Update table record action class
 *
 */
class aca_table_update_row extends _aca_table_action {
	

	
	public function html($object = false, $row_data = false) {
		
		return new aca_hidden_input(array('name'=>'action', 'value'=>$this->action_name()));
		
	}
	
	public static function action($plugin_id, $object_name) {
		
		$object = new $object_name($plugin_id);
		
		$object->load_values_from_array($_POST['propertie'], 'php2db');
		
		$object->save();
				
	}
	
}

?>