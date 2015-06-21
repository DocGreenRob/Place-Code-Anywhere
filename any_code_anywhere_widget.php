<?php

// aca Inc Manager Widget class. Extends default WP_Widget class. Used PHP 4 OOP.

class any_code_anywhere_widget extends WP_Widget {
 
	var $plugin_id;
	
	var $plugin_name;
	
	var $object_id;
	
	var $widget_public_title;
	
	var $inc_pages;
	
	var $exc_pages;
	
	var $hide_from_admin;
	
	var $code_align;
	
	var $code;
	
		
		
    /**
     * Class constructor
     * 
     * @param string $plugin_id ID of the plugin
     * @param string $plugin_name WP Name of the plugin 
     * @param string $widget_id ID used in $wp_widget_factory->widgets[$widget_id] array
     * @param string $widget_admin_title Name of the widget in admin Widgets page
     * @param string $widget_public_title Name of the widget on public pages. If set to blanc, widget will be displayed without title
     * @param array $inc_pages Pages for including code
     * @param array $exc_pages Pages where code can not be shown
     * @param string $hide_from_admin If this param evals to true the code will not be shown for logged in admin 
     * 
     */
    function any_code_anywhere_widget($plugin_id, $plugin_name, $object_id, $widget_id, $widget_admin_title, $widget_public_title, $inc_pages, $exc_pages, $hide_from_admin, $code_align, $code){
        	
    	$this->plugin_id = $plugin_id;
    	
    	$this->plugin_name = $plugin_name;
    	
    	$this->object_id = $object_id;
    	
    	$this->widget_public_title = $widget_public_title;
    	
    	$this->inc_pages = $inc_pages;
    	
    	$this->exc_pages = $exc_pages;
    	
    	$this->hide_from_admin = $hide_from_admin;
    	
    	$this->code_align = $code_align;
    	
    	$this->code = $code;
    	
    	$widget_ops = array('classname' => $widget_id, 'description' => __('aca Insert Manager Widget', $plugin_id) ); // Widget description
    
    	$this->WP_Widget($widget_id, $widget_admin_title, $widget_ops); // Widget name is include description
    	
    }

    /**
     * Prints widget on the public side
     */
	function widget($args, $instance){

		if (any_code_anywhere::check_visibility($this->inc_pages, $this->exc_pages, $this->hide_from_admin)) {

			echo $args['before_widget']; // Before the widget

    		if ($this->widget_public_title) echo $args['before_title'] . $this->widget_public_title . $args['after_title']; // The title if not blanc

    		echo '<div>';
    		
    		eval('?>'.any_code_anywhere::code_align(htmlspecialchars_decode($this->code, ENT_QUOTES), $this->code_align)); // widget code

    		echo '</div>'; 
    	
    		echo $args['after_widget']; // After the widget
    	
    	}
  
	}

    /**
     * Prints link to the widget settings on the admin side
     */
	function form($instance){
      
    	echo '<p style="text-align:left;"><a href="plugins.php?page=any-code-anywhere&amp;id='. $this->object_id .'">'. __('Settings') .'</a></p>';

    }

}

?>