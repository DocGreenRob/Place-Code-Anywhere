<?php

/**
 * @author Max Bond
 * 
 * Disable selected includes action class
 *
 */
class aca_table_disable_selected extends _aca_table_action {
	
	
	
	public function html($object = false, $row_data = false) {
		
		return array($this->action_name(), __('Deactivate', $this->plugin_id));
		
	}
	
	public static function action($plugin_id, $object_name) {
		
		$checked = $_POST['checked'];
	
		if (is_array($checked)) {
			
			$object = new aca_include_obj($plugin_id);
	
			foreach ($checked as $id=>$no_value) {
			
				$object->id->val = $id;
		
				$object->change_status(aca_include_obj::STATUS_DISABLED);
					
			}
				
		}
		
	}
	
}

?>