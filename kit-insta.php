<?php
 /*
Plugin Name: kit-insta
Plugin URI: http://kiperweb.se
Description: A simple and fast Instagram shortcode plugin. Please use [instagradam] to pull main feed!
Version: 1.0
Author: Yuki Yukawa
Author URI: yukiichiban.com
*/
//include stylesheet
/* include dirname( __FILE__ ) .'/insta-style.css'; */
//Include admin
include dirname( __FILE__ ) .'/admin/admin-init.php';
    // fix SSL request error
	// style etc
//Enqueue stylesheet

add_action( 'wp_footer', 'load_scriptsjs' );
function load_scriptsjs() {
 
        wp_enqueue_script( 'jquery' );

        wp_register_script( 'infinite', plugins_url( 'kit-insta/js/jquery.infinitescroll.min.js'), array( 'jquery' ) );
		wp_register_script( 'fts-images-loaded', plugins_url( 'kit-insta/js/imagesloaded.pkgd.min.js',array( 'jquery' ) ));
        wp_register_script( 'kit-script', plugins_url( 'kit-insta/js/kit-script.js',array( 'jquery' )));
		wp_enqueue_script('infinite');
		wp_enqueue_script('fts-images-loaded');
		wp_enqueue_script('kit-script');
}
add_action( 'wp_enqueue_scripts', 'kit_instagram_styles_enqueue' );
function kit_instagram_styles_enqueue() {
    wp_register_style( 'instagram_styles', plugins_url('css/style.css', __FILE__), array(), SBIVER );
    wp_enqueue_style( 'instagram_styles' );
    wp_enqueue_style( 'instagram_icons', '//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css?1', array(), '4.2.0' );
}

    add_action( 'http_request_args', 'no_ssl_http_request_args', 10, 2 );
    function no_ssl_http_request_args( $args, $url ) {
        $args['sslverify'] = false;
        return $args;
    }
 
// register shortcode
    add_shortcode( 'kit-hashtag', 'kit_embed_shortcode' );
     
// define shortcode
    function kit_embed_shortcode( $atts, $content = null ) {
// define main output
        $str1    = "";
// get remote data

	global $Kit_options;


$result = wp_remote_get( "https://api.instagram.com/v1/tags/".$Kit_options['opt-hashtag']."/media/recent?client_id=3fa58c1136654e54a30a68aa133c807e" );


}
// register shortcode
    add_shortcode( 'kit-user', 'kit_embed_shortcode2' );
     
// define shortcode
    function kit_embed_shortcode2( $atts, $content = null ) {
// define main output
        $str2    = "";
// get remote data

	global $Kit_options;


$result = wp_remote_get( "https://api.instagram.com/v1/users/".$Kit_options['opt-hashtag']."/media/recent?client_id=3fa58c1136654e54a30a68aa133c807e" );


}


	?>
<div id="insta-container">
<?php
	$testing = $kit_select;
	echo $result;
	echo $testing;

        if ( is_wp_error( $result ) ) {
            // error handling
            $error_message = $result->get_error_message();
            $str1           = "Something went wrong: $error_message";
			$str2           = "Something went wrong: $error_message";
        } else {
            // processing further
            $result    = json_decode( $result['body'] );
            $main_data = array();
            $n         = 0;
			

// get username and actual thumbnail

            foreach ( $result->data as $d ) {
                $main_data[ $n ]['user']      = $d->user->username;
                $main_data[ $n ]['thumbnail'] = $d->images->thumbnail->url;
                $n++;
            }

// create main string, pictures embedded in links
            foreach ( $main_data as $data ) {
                $str1 .= '<a class="insta-img" target="_blank" href="http://instagram.com/'.$data['user'].'"><img src="'.$data['thumbnail'].'" alt="'.$data['user'].' pictures"></a>';
				$str2 .= '<a class="insta-img" target="_blank" href="http://instagram.com/'.$data['user'].'"><img src="'.$data['thumbnail'].'" alt="'.$data['user'].' pictures"></a>';
            }
        }
 ?>
</div>
<?php
        return $str1;
		return $str2;
?>