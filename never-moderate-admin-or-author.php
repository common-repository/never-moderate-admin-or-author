<?php
/*
Plugin Name: Never Moderate Admin or Post Author
Version: 0.9.1
Plugin URI: http://www.coffee2code.com/wp-plugins/
Author: Scott Reilly
Author URI: http://www.coffee2code.com
Description: **DEPRECATED** Never moderate or mark as spam comments made by the site admin or the post's author regardless of the apparent spamminess of the comment.

=>> Visit the plugin's homepage for more information and latest updates  <<=

Installation:

1. Download the file http://www.coffee2code.com/wp-plugins/never-moderate-admins.zip and unzip it into your
/wp-content/plugins/ directory.
2. Optional: Change the configuration option dictating the minimum user level that should never be moderated
3. Activate the plugin from your WordPress admin 'Plugins' page.


Configuration help:

The only configuration option available for the plugin is defined as an argument with a default value for the c2c_never_moderate_admin() function:

$min_user_level : All users with a user level greater than or equal to the value set for this argument will NEVER be moderated.  By default, this
value is '10', which means that only the site admin would never be moderated.  If you set this to '0', then everyone who has registered to your site
will be able to make comments without being moderated/marked as spam.  Setting it to '1' would mean only those with the ability to write posts would
be able to comment without moderation.  Obviously, you can also define a value anywhere else in the range 0-10.

*/

/*
Copyright (c) 2005 by Scott Reilly (aka coffee2code)

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation 
files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, 
modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the 
Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR
IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

*/

// All users with a user level greater than or equal to $min_user_level will NEVER be moderated
function c2c_never_moderate_admin( $approved, $min_user_level='10' ) {
	global $wpdb, $commentdata;
	$userdata = get_userdata($commentdata['user_ID']);
	if ( ('1' !== $approved) && !empty($userdata->user_level)  ) {
		if ( $userdata->user_level >= $min_user_level ) {
			$approved = 1;
		} else {
			$author_id = $wpdb->get_var("SELECT post_author FROM $wpdb->posts WHERE ID = '" . $commentdata['comment_post_ID'] . "'");
			if ( $userdata->ID == $author_id )
				$approved = 1;
		}
	}
	return $approved;
}

add_filter('pre_comment_approved', 'c2c_never_moderate_admin', 25);

?>