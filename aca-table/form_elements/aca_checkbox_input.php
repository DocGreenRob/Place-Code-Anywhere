<?php

/**
 * @author Max Bond
 * 
 * <input type="checkbox"/> element
 *
 */
class aca_checkbox_input extends _aca_input {
	
	
	
	public function html() {
		
		if (!$this->checked && $this->value == $this->value_to_select) $this->checked = ' checked="checked"';
				
		return '<input type="checkbox" name="'. $this->name .'" value="'. $this->value_to_select .'"'. $this->class.$this->id.$this->checked.$this->disabled.$this->style.$this->js .'/>';
		
	}
	
}

?>