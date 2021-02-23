<?php
$username = isset( $_REQUEST ) && isset( $_REQUEST['username'] ) ? $_REQUEST['username'] : NULL;

/**
 * This will redirect the user to their demo site's /wp-admin
 */
if(!empty($username)){
    wp_safe_redirect( home_url().'/'.$username.'/wp-admin/?firstrun=1' );
}

?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Amplify Plugins Test Drive</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/normalize.css">

<?php
wp_enqueue_script('jquery');
wp_head()
?>
    </head>
    <body>



        <img style="width:200px" id="testdrive-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/images/money-4029562_640.png">
        <!-- Add your home page content here -->
        <h1>T-Minus 5, 4, 3 ...</h1>
        <p>
            You're just seconds away from test driving these great plugins by Amplify Plugins.
        </p>
        <p>Enter a valid email and select the plugins you want to test drive. We will send your test drive site credentials to you.</p>
<div id="form">
<?php
// Insert the form from Gravity Forms.
gravity_form( 1, $display_title = false, $display_description = false, $display_inactive = false, $field_values = null, $ajax = false, $tabindex = 2, $echo = true );
/**
 * Populate the hidden username field based on the email address entered into the email field. 
 * #input_1_2 is the email address field.
 * #input_1_1 is the username field. This field is hidden with CSS.
 * Remove from the username field anything that is not a lowercase letter (a-z), uppercase letter (A-Z), or numeric (0-9) (i.e. no special characters like @_+, etc.)
 * This will be use as the subdirectory name, which can't have any special characters.
 */
?>
<script>
jQuery( document ).ready(function($) {
   $( "#input_1_2" ).on('input',function() {
      $("#input_1_1").val($("#input_1_2").val().replace(/[^a-zA-Z0-9 ]/g, ""));
});});
</script>

<?php wp_footer() ?>
    </body>
</html>
