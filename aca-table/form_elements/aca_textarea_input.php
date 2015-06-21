<?php

/**
 * @author Max Bond
 * 
 * <textarea> element
 *
 */
class aca_textarea_input extends _aca_input {
	
	
	
	public function html() {
		
		return '<textarea name="'. $this->name .'"'. $this->class.$this->id.$this->style.$this->js .'>'. $this->value .'</textarea>'.PHP_EOL;;
		
	}
	
}

?>