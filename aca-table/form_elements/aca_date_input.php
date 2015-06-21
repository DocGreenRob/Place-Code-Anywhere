<?php

class aca_date_input  extends _aca_input {
	
	
	
	public function html() {
		
		$day = new aca_text_input(array('name'=>$this->name.'[day]', 'class'=>'day_input', 'maxlength'=>2, 'value'=>$this->value['day']));
		
		$month = new aca_month_input(array('name'=>$this->name.'[month]', 'value'=>$this->value['month']));
		
		$year = new aca_text_input(array('name'=>$this->name.'[year]', 'class'=>'year_input', 'maxlength'=>4, 'value'=>$this->value['year']));
		
		return $day.'&nbsp;'.$month.'&nbsp;'.$year;
		
	}
	
	
}

?>