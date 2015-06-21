<?php

class aca_checkbox_multi_input  extends _aca_input {
	
	
	
	public function html() {
		
		/*if ($this->value) {
			
			$values = implode(',', (array)$this->value);
								
		}
		
		var_dump($this->value);*/
		
		$roles = $this->value_to_select;
		
		foreach ($roles as $role=>$name) {
			
			if (in_array($role, (array)$this->value)) $checked = true; else $checked = false;
			
			$checkbox = new aca_checkbox_input(array('name'=>$this->name.'['.$role.']', 'checked'=>$checked, 'value'=>1));
		
			$res[] =  $checkbox . '&nbsp;'. $name;
		
		}
		
		$res = implode(', ', $res);
		
		return $res;
		
	}
	
}

?>