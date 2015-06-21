<?php

class aca_table_wp_page_select extends _aca_table_action {
	
	
		
	public function html($object = false, $row_data = false) {
		
		
		
	}	
	
	public static function action($plugin_id, $object_name) {
		
		$_SERVER['HTTP_REFERER'] = '';
		
		$id = $_GET['id'];
		
		$type = $_GET['type'];
		
		$select = new aca_select_input();
		
		$select->multiple = true;
		
		$select->style = 'width: 635px; height: 450px;';
		
		$select->id = 'select_wp_pages';
		
		$select->value_to_select = self::selectable_pages($plugin_id, $type);
		
		$select->prepare();
		
		$submit = new aca_submit_input(array('value'=>__('Apply', $plugin_id), 'class'=>'button-secondary'));
		
		$cancel = new aca_button_input(array('value'=>__('Cancel', $plugin_id), 'class'=>'button-secondary'));
		
		$cancel->js = 'onclick="tb_remove()"';
		
		$res = '<form action="" method="get" id="select_wp_pages_form" style="overflow: hidden">'.PHP_EOL;

		$res .= $select;
		
		$res .= '<div style="color: rgb(33,117,155); float: right; margin-top: 3px">'. __('To select multiple pages or deselect page hold CTRL key', $plugin_id) .'</div>';
		
		$res .= $submit.$cancel;
		
		$res .= '</form>';
		
		$res .= '<script type="text/javascript">';
		
		$res .= 'var selected_values_str = jQuery("#'.$id.' input").attr("value");
				var selected_values_array = selected_values_str.split(",");
				jQuery("#select_wp_pages option").each(function () {
					var opt_val = jQuery(this).attr("value");
					if (jQuery.inArray(opt_val, selected_values_array) > -1) jQuery(this).attr("selected", "selected");	
				});';
		
		$res .= 'jQuery("#select_wp_pages_form").submit(function(){
					var str = "";
					var values = "";
					var comma = ",";
					var slash = " // ";
					var i = 0;
					var num = jQuery("#select_wp_pages option:selected").length;
					jQuery("#select_wp_pages option:selected").each(function () {
						i++;
						if (i == num) {
							comma = "";
							slash = "";
						}
						str += jQuery(this).text() + slash;
						values += jQuery(this).attr("value") + comma;					
					});
					jQuery("#'.$id.' input").attr("value", values);
					jQuery("#'.$id.' .selected_pages").text("'. __('Pages', $plugin_id) .': " + str);
					tb_remove();
					return false;
				})';
		
		$res .= '</script>';
				
		echo $res;  
		
	}
	
	/**
 	 * Returns array of selectable pages 
 	 * 
 	 */
	protected static function selectable_pages($plugin_id, $type) { // $type = [include] [exclude]
		
		global $wp_post_types, $wp_taxonomies;
		
		$values_to_select = aca_include_obj::page_selectors($plugin_id);
		
		if ($type == 'exclude') array_shift($values_to_select);
		
		$options = get_option(any_code_anywhere::ID);
		
		if (!$options) $options = any_code_anywhere::$default_options;

		if ($options['taxonomies']['post_format']['enable']) {
		
			$formats_orig = get_post_format_strings();
		
			foreach ($formats_orig as $fkey=>$fname) {
			
				$formats['post_format_'.$fkey] = __('PF', $plugin_id).': '.$fname;
			
			}
		
			$values_to_select[__('Post Formats')] = $formats;
		
		}
		
		foreach ($options['post_types'] as $post_type=>$params) {
			
			$pages = NULL;
			
			if ( $params['enable'] == 'on' && !in_array($post_type, any_code_anywhere::$restricted_post_types) ) {
				
				$post_type_name = $wp_post_types[$post_type]->labels->name;
				
				$selectors = array($post_type.'_all' => __('All', $plugin_id).' '.$post_type_name);
				
				if (version_compare($GLOBALS['wp_version'], '3.1.0', '>=') && $post_type != 'page') {
					
					$selectors = array_merge($selectors, array('post_type_archive_'.$post_type => __('Archive', $plugin_id).': '.$post_type_name));
					
				}
				
				if ($params['expand'] == 'on') {
					
					$pages = aca_table_func::select_post_type($post_type);
					
				}
				
				if (!empty($pages)) $selectors = array_merge($selectors, $pages);
				
				$values_to_select[$post_type_name] = $selectors;
				
			}
			
		}
		
		foreach ($options['taxonomies'] as $taxonomy=>$params) {
			
			$pages = NULL;
			
			if ( $params['enable'] == 'on' && !in_array($taxonomy, any_code_anywhere::$restricted_taxonomies) ) {
				
				$taxonomy_name = $wp_taxonomies[$taxonomy]->labels->name;
				
				$selectors = array($taxonomy.'_all' => __('All', $plugin_id).' '.$taxonomy_name);
				
				if ($params['expand'] == 'on') {
					
					$pages = aca_table_func::select_taxonomy($taxonomy);
					
				}
				
				if (!empty($pages)) $selectors = array_merge($selectors, $pages);
				
				$values_to_select[$taxonomy_name] = $selectors;
				
			}
			
		}
		
		/*$pages = aca_table_func::wp_pages();
		
		if (!empty($pages)) $values_to_select[__('Pages', $plugin_id)] = $pages;
		
		$pages = aca_table_func::wp_categories();
		
		if (!empty($pages)) $values_to_select[__('Categories', $plugin_id)] = $pages;
		
		$pages = aca_table_func::wp_tags();
				
		if (!empty($pages)) $values_to_select[__('Tags', $plugin_id)] = $pages;
		
		$pages = aca_table_func::wp_posts();
		
		if (!empty($pages)) $values_to_select[__('Posts', $plugin_id)] = $pages;*/

		return $values_to_select;
	
	}
			
}

?>