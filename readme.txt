=== Never Moderate Admin or Author ===
Contributors: coffee2code
Donate link: http://coffee2code.com/donate
Tags: comment, moderation, subscribers, spam, admin, author, coffee2code
Requires at least: 1.5
Tested up to: 1.5
Stable tag: 0.9.1
Version: 0.9.1

**DEPRECATED** Never moderate or mark as spam comments made by the site admin or the post's author regardless of the apparent spamminess of the comment.


== Description ==

**DEPRECATED** Never moderate or mark as spam comments made by the site admin or the post's author regardless of the apparent spamminess of the comment.

'''THIS PLUGIN IS DEPRECATED AND NO LONGER NECESSARY AS OF WORDPRESS 2.5'''

''This plugin has been [deprecated](http://coffee2code.com/archives/2008/04/06/day-of-deprecations/)!  It is no longer necessary as its functionality has been integrated into WordPress.  There will not be any continued support for it.

When I released the plugin, I also simultaneously made a bug report and patch for the WP core, which was quickly accepted and applied.

Reported as a bug in trac ticket [#1262](http://trac.wordpress.org/ticket/1262).
Fixed in WordPress in changeset [#2556](http://trac.wordpress.org/changeset/2556).''

---

The only configuration option available for the plugin is defined as an argument with a default value for the `c2c_never_moderate_admin()` function:

$min_user_level : All users with a user level greater than or equal to the value set for this argument will NEVER be moderated.  By default, this
value is '10', which means that only the site admin would never be moderated.  If you set this to '0', then everyone who has registered to your site
will be able to make comments without being moderated/marked as spam.  Setting it to '1' would mean only those with the ability to write posts would
be able to comment without moderation.  Obviously, you can also define a value anywhere else in the range 0-10.


== Installation ==

1. Unzip `never-moderate-admin-or-author.zip` inside the `/wp-content/plugins/` directory (or install via the built-in WordPress plugin installer)
1. Activate the plugin through the 'Plugins' admin menu in WordPress


== Frequently Asked Questions ==

= Doesn't WordPress already do this? =

Yes, it does now as a result of a patch I submitted.  Which is why this plugin has been deprecated.


== Changelog ==

= 0.9.1 =
* Add readme.txt
* Move into dedicated sub-directory

= 0.9 =
* Initial release


== Upgrade Notice ==

= 0.9.1 =
Plugin has long been deprecated and is no longer supported.  Its functionality is part of WordPress.