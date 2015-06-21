<?php

/**
 * @author Max Bond
 * 
 * <input type="submit"/> element
 *
 */
class aca_submit_input extends _aca_input {
	
	
	
	public function html() {
		
		return '<input type="submit" value="'. $this->value .'"'. $this->class.$this->id.$this->style.$this->js .'/>'.PHP_EOL;
		
	}
	
}

?>