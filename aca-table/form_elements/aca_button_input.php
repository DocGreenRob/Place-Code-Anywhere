<?php

/**
 * @author Max Bond
 * 
 * <input type="button"/> element
 *
 */
class aca_button_input extends _aca_input {
	
	
	
	public function html() {
		
		return '<input type="button" value="'. $this->value .'"'. $this->class.$this->id.$this->style.$this->js .'/>'.PHP_EOL;
		
	}
	
}

?>