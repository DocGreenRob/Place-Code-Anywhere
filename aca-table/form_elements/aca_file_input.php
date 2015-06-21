<?php

/**
 * @author Max Bond
 * 
 * <input type="file"/> element
 *
 */
class aca_file_input extends _aca_input {
	
	
	
	public function html() {
		
		return '<input type="file" name="'. $this->name .'"'. $this->class.$this->id.$this->style.$this->js .'/>'.PHP_EOL;
		
	}
	
}

?>