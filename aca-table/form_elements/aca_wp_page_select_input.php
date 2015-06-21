<?php

class aca_wp_page_select_input  extends _aca_input {
	
	public $type;
	
	
	
	public function html() {
		
		if ($this->type == 'include') {
			
			$type = '&amp;type=include';
			
			$field_id = 'inc_pages_select'; 
		
		} elseif ($this->type == 'exclude') {
			
			$type = '&amp;type=exclude';
			
			$field_id = 'exc_pages_select';
			
		} else {
			
			$type = false;
			
			$field_id = false;
			
		}
		
		if ($this->value) {
			
			$value = (array) $this->value;
			
			$saved_values = implode(',', $value);
			
			$pages = '';
			
			foreach ($value as $id) {
				
				$pages .= aca_select_page_conv::page_title($id).' // ';
				
			}
			
			$pages = substr_replace($pages, '', -4);
		
		}

		$saved_values = isset($saved_values) ? $saved_values : '';
		$pages = isset($pages) ? $pages : '';
		
		$res = '<div '. $this->id .'>'.PHP_EOL;
		
		$res .= '<div><a href="'. site_url() . '/wp-content/plugins/any-code-anywhere/aca-table/aca_get.php?width=640&amp;height=485&amp;action=aca_table_wp_page_select&amp;id='. $field_id . $type .'&amp;wp_nonce='. wp_create_nonce('aca_table_get') .'" title="'. __('Select pages', any_code_anywhere::ID) .'" class="thickbox" style="text-decoration: none">[...]</a></div>'.PHP_EOL;

		$res .= '<input type="hidden" name="'. $this->name .'" value="'. $saved_values .'"/>';
		
		$res .= '<div class="selected_pages">'. __('Pages', any_code_anywhere::ID) .': '. $pages .'</div>'.PHP_EOL;
		
		$res .= '</div>'.PHP_EOL;
		
		return $res;
		
	}
	
	
}

?>