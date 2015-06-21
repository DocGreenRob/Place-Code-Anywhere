<?php

/**
 * @author Max Bond
 * 
 * <input type="text"/> element
 *
 */
class aca_text_input extends _aca_input {
	
	
	
	public function html() {
		
		return '<input type="text" name="'. $this->name .'" value="'. $this->value .'"'. $this->class.$this->id.$this->maxlength.$this->style.$this->js .'/>'.PHP_EOL;
		
	}
	
}

?>