<?php
/**
 * 
 * @package LastUpdatedDate
 * @author Karthik
 * @copyright 2022 8Subjects.com
 * @license GPL-2.0-or-later
 * 
 * 
 * Plugin Name: Last Updated DateTime in Posts
 * Plugin URI: https://8subjects.com
 * Description: A Wordpress Plugin will displays the Last Updated Date & Time in your posts instead of creation date.
 * Version: 1.0.0
 * Author: Karthik
 * Author URI: https://nkmswot.github.io/
 
 * 
 */


class lastUpdatedDate {

        public function __construct() {
                //Hook up the default date value into modified date
                add_filter('get_the_date', array($this, 'last_modified_time'));
            }
        

        public function last_modified_time($post_time){

            if ( is_single() ) { 
                //with some text
                //$post_time="Last Updated on ".get_post_modified_time('F jS, Y');
                //clean format
                $post_time=get_post_modified_time('F jS, Y');
            }

            return $post_time;
        }

}

//initiate the plugin
$obj=new lastUpdatedDate();
