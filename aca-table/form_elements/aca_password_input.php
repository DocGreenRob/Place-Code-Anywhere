<?php

/**
 * @author max Bond
 * 
 * <input type="password"/> element
 *
 */
class aca_password_input extends _aca_input {
	
	
	
	public function html() {
				
		return '<input type="password" name="'. $this->name .'" value="'. $this->value .'"'. $this->class.$this->id.$this->maxlength.$this->style.$this->js .'/>'.PHP_EOL;
		
	}
	
}

?>