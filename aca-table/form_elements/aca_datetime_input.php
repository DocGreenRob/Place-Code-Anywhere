<?php

class aca_datetime_input  extends _aca_input {
	
	
	
	public function html() {
		
		$date = new aca_date_input(array('name'=>$this->name, 'value'=>$this->value['date']));
		
		$time = new aca_time_input(array('name'=>$this->name, 'value'=>$this->value['time']));
		
		return $date.'&nbsp;'.$time;
		
	}
		
}

?>