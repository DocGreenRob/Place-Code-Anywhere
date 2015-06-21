<?php

/**
 * @author Max Bond
 * 
 * <input type="hidden"/> element
 *
 */
class aca_hidden_input extends _aca_input {
	
	
	
	public function html() {
		
		if ($this->value) {
			
			return '<input type="hidden" name="'. $this->name .'" value="'. $this->value .'"'. $this->class.$this->id .'/>'.PHP_EOL;
		
		} else {
				
			return false;
		
		}
	
	}
		
}

?>