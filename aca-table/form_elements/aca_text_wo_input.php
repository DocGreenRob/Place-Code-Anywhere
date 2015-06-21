<?php

/**
 * @author Max Bond
 * 
 * Output text instead of <input type="text"/> element
 *
 */
class aca_text_wo_input extends _aca_input {
	
	
	
	public function html() {
		
		return '<span '. $this->class.$this->id.$this->style.$this->js .'>'. $this->value .'</span><input type="hidden" name="'. $this->name .'" value="'. $this->value .'"'. $this->class.$this->id .'/>'.PHP_EOL;
		
	}
	
}

?>