<?php

class aca_time_input  extends _aca_input {
	
	public $seconds = false;
	
	
	
	public function html() {
		
		$h = new aca_text_input(array('name'=>$this->name.'[h]', 'class'=>'h_input', 'maxlength'=>2, 'value'=>$this->value['h']));
		
		$m = new aca_text_input(array('name'=>$this->name.'[m]', 'class'=>'m_input', 'maxlength'=>2, 'value'=>$this->value['m']));
		
		if ($this->seconds) {
			
			$s = ' : '.$s = new aca_text_input(array('name'=>$this->name.'[s]', 'class'=>'s_input', 'maxlength'=>2, 'value'=>$this->value['s']));
		
		}
		
		return $h.' : '.$m.$s;
		
	}
	
	
}

?>