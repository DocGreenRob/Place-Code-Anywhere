<?php

/**
 * @author Max Bond
 * 
 * Delete selected table records action class
 *
 */
class aca_table_delete_selected extends _aca_table_action {
	
	
	
	public function html($object = false, $row_data = false) {
		
		return array($this->action_name(), __('Delete', $this->plugin_id));
		
	}
	
	public static function action($plugin_id, $object_name) {
		
		$checked = $_POST['checked'];
	
		if (is_array($checked)) {
			
			$object = new $object_name($plugin_id);
				
			foreach ($checked as $id=>$no_value) {
			
				$object->id->val = $id;
		
				if ($object->delete()) {
					
					aca_table_func::change_ref_after_del($object->id->col_name, $id);
									
				}
		
			}
				
		}
		
	}
	
}

?>