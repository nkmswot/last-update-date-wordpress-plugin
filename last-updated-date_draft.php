<?php

/**
 * 
 * @package LastUpdated
 * @author Karthik
 * @copyright 2022 8Subjects.com
 * @license GPL-2.0-or-later
 * 
 * 
 * Plugin Name: Last Updated DateTime in Posts
 * Plugin URI: https://8subjects.com
 * Description: This Plugin will displays the Last Updated Date & Time in your posts instead of creation date.
 * Version: 0.1.0
 * Author: Karthik
 * Author URI: https://nkmswot.github.io/
 
 * 
 */

/*
class lastUpdateDate{

        function __construct() {
                add_action( 'admin_init', array('content', 'lastupdate_addpage' ) );
                //add_action('change_values', array( $this, 'change_date_values'));
            }

        function change_date_values(){

        }
        
        function lastupdate_addpage($content) {
            
            if ( is_single() ) { 
                //$h_time = get_the_time( __( 'Y/m/d' ), $post );
                return $this->get_modified_date();
            }
            //add_filter('the_content', 'wpb_follow_us'); 
            

            //$page = add_theme_page( 'Last Update', 'Theme Check', 'manage_options', 'themecheck', array( $this, 'themecheck_do_page' ) );
            //add_action( 'admin_print_styles-' . $page, array( $this, 'load_styles' ) );

            }

        add_filter('the_content', lastupdate_addpage()); 

        function get_modified_date() {
            $u_time = get_the_time('U'); 
            $u_modified_time = get_the_modified_time('U'); 
            $display="<p>Last modified on ".the_modified_time('F jS, Y')."</p>";
                if ($u_modified_time >= $u_time + 86400){ 
                    echo "<p>Last modified on "; 
                    the_modified_time('F jS, Y'); 
                    echo " at "; 
                    the_modified_time(); 
                    echo "</p> ";
                } 
            return $display;
        }


}
*/


function wpb_follow_us($content) {
 
// Only do this when a single post is displayed
if ( is_single() ) { 
 
// Message you want to display after the post
// Add URLs to your own Twitter and Facebook profiles
 
$content .= '<p class="follow-us">If you liked this article, then please follow us on <a href="http://twitter.com/wpbeginner" title="WPBeginner on Twitter" target="_blank" rel="nofollow">Twitter</a> and <a href="https://www.facebook.com/wpbeginner" title="WPBeginner on Facebook" target="_blank" rel="nofollow">Facebook</a>.</p>';
 
} 
// Return the content
return $content; 
 
}

// Hook our function to WordPress the_content filter
add_filter('the_content', 'wpb_follow_us'); 

 function get_modified_display() {
            $u_time = get_the_time('U'); 
            $u_modified_time = get_the_modified_time('U'); 
            //$display="<p>Last modified on # ".the_modified_time('F jS, Y')."</p>";
              if ($u_modified_time >= $u_time + 86400){ 
                    //echo "<p>Last modified on "; 
                    $display= "<p>Last modified on "; 
                    $display.= the_modified_time('F jS, Y'); 
                    //echo " at "; 
                    $display.=" at "; 

                    $display.=the_modified_time(); 
                    //echo "</p> ";
                    $display.="</p> ";
              } 
            return $display;
        }
/*
function get_the_modified_date( $format = '', $post = null ) {
    $post = get_post( $post );
 
    if ( ! $post ) {
        // For backward compatibility, failures go through the filter below.
        $the_time = false;
    } else {
        $_format = ! empty( $format ) ? $format : get_option( 'date_format' );
 
        $the_time = get_post_modified_time( $_format, false, $post, true );
    }
 
    //return apply_filters( 'get_the_modified_date', $the_time, $format, $post );
}
*/

function last_modified_time($post_time){

if ( is_single() ) { 
$post_time="Last Updated on ".get_post_modified_time('F jS, Y');
//get_modified_display();
}

return $post_time;
}

// Hook our function to WordPress the_content filter
//add_filter('the_content', 'wpb_follow_us'); 


// Hook our function to WordPress the_content filter
add_filter('get_the_date', 'last_modified_time'); 




