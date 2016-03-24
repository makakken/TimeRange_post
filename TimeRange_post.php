<?php
/*
Plugin Name: TimeRange - Post
Plugin URI:  https://github.com/makakken/TimeRange_post
Description: This Plugin adds Start/End - Timestamps as Post-Meta to Posts.
Version:     0.0.1
Author:      Stephan Kropop
Author URI:  http://makakken.de
License:     GPL3
License URI: http://www.gnu.org/licenses/gpl-3.0.de.html
Domain Path: /languages
Text Domain: timerange-post
*/

class TimeRange_post {

	private $version = '0.0.1';
	
	public static function add_meta_box_HOOK() {
			add_meta_box(
				'TimeRange_metabox',          // this is HTML id of the box on edit screen
				__('Ausstellungsdaten'),    // title of the box
				array('TimeRange_post','TimeRange_MetaBox'),   // function to be called to display the checkboxes, see the function below
				'post',        // on which edit screen the box should appear
				'advanced',      // part of page where the box should appear
				'high'      // priority of the box
			);
	}

	public static function TimeRange_MetaBox($post) {
		wp_enqueue_script('jquery-ui-datepicker',false,array('jquery') );
		wp_enqueue_style( 'timerange-post',plugins_url('style.css', __FILE__));
		wp_enqueue_script( 'timerange-post-dateppicker',plugins_url('js/TimeRange-Post.js', __FILE__));

		// Set Default Dates
		$start_date = $end_date = date('Y-m-d', time());
		// Get Date Values from DB
		if( intval(get_post_meta($post->ID,'post_start_date',true)) > 0 ) {
			$start_date = date('Y-m-d',intval(get_post_meta($post->ID,'post_start_date',true)));
		} 
		if( intval(get_post_meta($post->ID,'post_end_date',true)) > 0 ) {
			$end_date = date('Y-m-d',intval(get_post_meta($post->ID,'post_end_date',true)));
		}
		echo '<div class"TimeRange-Post">';
		echo '<table>'.PHP_EOL;				  
		echo ' <tr>'.PHP_EOL;
		echo '	<td> '.PHP_EOL;
		_e('Opening-Date');
		echo '	</td>'.PHP_EOL;
		echo '	<td>'.PHP_EOL;
		_e('Closing-Date');
		echo ' </td>'.PHP_EOL;
		echo ' </tr>'.PHP_EOL;
		echo ' <tr>'.PHP_EOL;
		echo '  <td><input type="date" name="post_start_date" id="post_start_date" class="date" value="'.$start_date.'"/></td>'.PHP_EOL;
		echo '  <td><input type="date" name="post_end_date" id="post_end_date" class="date" value="'.$end_date.'"/></td>'.PHP_EOL;
		echo ' </tr>'.PHP_EOL;
		echo '</table>'.PHP_EOL;
		echo '</div>';
	}
}

//Hooks
add_action( 'add_meta_boxes', array('TimeRange_post','add_meta_box_HOOK') );
?>