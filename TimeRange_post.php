<?php
class TimeRange_post {

	private $version = '0.0.1';
	
	public static function add_meta_box_HOOK() {
			add_meta_box(
				'TimeRange_metabox',          // this is HTML id of the box on edit screen
				__('Ausstellungsdaten'),    // title of the box
				'TimeRange_post',   // function to be called to display the checkboxes, see the function below
				'event',        // on which edit screen the box should appear
				'advanced',      // part of page where the box should appear
				'high'      // priority of the box
			);
	}

	public static function TimeRange_post($post) {
		wp_enqueue_script('jquery-ui-datepicker',false,array('jquery') );
		wp_enqueue_style( 'timerange-post',plugins_url('style.css', __FILE__));

		// Set Default Dates
		$start_date = $end_date = date('Y-m-d', time());
		// Get Date Values from DB
		if( intval(get_post_meta($post->ID,'event_start_date',true)) > 0 ) {
			$start_date = date('Y-m-d',intval(get_post_meta($post->ID,'event_start_date',true)));
		} 
		if( intval(get_post_meta($post->ID,'event_end_date',true)) > 0 ) {
			$end_date = date('Y-m-d',intval(get_post_meta($post->ID,'event_end_date',true)));
		}

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
		echo '  <td><input type="date" name="event_start_date" class="date" value="'.$start_date.'"/></td>'.PHP_EOL;
		echo '  <td><input type="date" name="event_end_date" class="date" value="'.$end_date.'"/></td>'.PHP_EOL;
		echo ' </tr>'.PHP_EOL;
		echo '</table>'.PHP_EOL;
		echo '<script language="javascript">';
		echo 'jQuery(function() {';
		echo ' if ( jQuery(\'[type="date"]\').prop(\'type\') != "date" ) { jQuery(\'[type="date"]\').datepicker({ dateFormat: \'dd.mm.yy\' }); }';
		echo '});';
		echo '</script>';
	}
}

//Hooks
add_action( 'add_meta_boxes', array('TimeRange_post','add_meta_box_HOOK') );
?>