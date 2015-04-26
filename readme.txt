=== SAR Friendly SMTP ===
Contributors: samuelaguilera
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=9E45TMW9JCPRW
Tags: email, smtp, notifications, phpmailer, sendmail, gmail, mandrill, wp_mail
Requires at least: 3.9.3
Tested up to: 4.2
Stable tag: 1.0.6
License: GPL3

A friendly SMTP plugin for WordPress. No third-party, simply using WordPress native possibilities.

== Description ==

There are A LOT of SMTP plugins for WordPress, some uses third-party libraries with no too much luck, others looks like the same plugin (almost identical source code) but with different name...

Most of them overwrites from address and from name fields ALWAYS, breaking functionality of some other plugins that send emails using wp_mail() function.

So the history repeats again, I can't find one simple plugin that fits my needs, so I created one for myself and share it with you in the hope that you'll find it useful.

If you're happy with the plugin [please don't forget to give it a good rating](https://wordpress.org/support/view/plugin-reviews/sar-friendly-smtp?filter=5), it will motivate me to keep sharing and improving this plugin (and others).

= Features =

* KISS principle.
* No third-party libraries for SMTP, uses WordPress core.
* Respect fields modified by other plugins (e.g. Gravity Forms).
* Option to enable debug mode (logs communication between WordPress and your SMTP server in PHP's error_log file, check [FAQ](https://wordpress.org/plugins/sar-friendly-smtp/faq/) for more details).
* Uses WordPress settings API for settings page, making it secure by default.
* Custom capability for settings access, so you can allow non administrator users to access to the settings page if you need it using [User Role Editor](https://wordpress.org/plugins/user-role-editor/) (or any other similar plugin).
* Send Email Test page in Tools menu. Allowing you to test if WordPress is able to send emails using the SMTP server details provided.

= Requirements =

* WordPress 3.9.3 or higher.
* SMTP server :)

= Usage =

Just install in your WordPress like any other plugin, activate it and fill settings using your SMTP server details. If you're not sure about what you need to put in each field, ask to your SMTP server support.

== Installation ==

* Extract the zip file and just drop the contents in the <code>wp-content/plugins/</code> directory of your WordPress installation (or install it directly from your dashboard) and then activate it from Plugins page.

== Frequently Asked Questions ==

= I can't receive emails sent by my WordPress, what happen? =

This plugin is just a way to tell WordPress something like: "Please dear WordPress, use my SMTP server to send the emails, don't use the web server."

That means that **this plugin don't send you emails**, WordPress sends your emails using **your SMTP server**.

If you're having trouble sending your emails, you can activate the debug mode in settings page. That activates the logging of the commands and data between WordPress and your SMTP server, and **most of the time** you will find useful information in your PHP error_log file.

**Remember to turn off Debug Mode when you're done with the troubleshooting to avoid raising your server load by generating unnecessary logs.**


= Where can I find that PHP error log file? = 

The location of the PHP error_log file it's not the same in all servers, because it can be customized by the server admin. In all cases you'll need to use a (S)FTP client to check it. Example of possible locations:

* Some major shared hosting companies (i.e Hostgator), put this file in the root of your site (i.e. /public_html/ ) with the name of error_log
* Some other shared hostings put it inside of a "logs" directory in the root of your (S)FTP account.
* And unfortunatelly, there're some hosting companies that don't allow the user to access directly to this error log file. So you'll need to contact your hosting support.
* If you're using a VPS or dedicated server you know how to find this file! ;) The path of the file anyway is controled by error_log directive in php.ini or if you're using PHP-FPM by php_admin_value[error_log] in your pool .conf file.
* Where there's no path specified for the PHP's error_log file, this information should be added to your web server (i.e. Apache) error log.

If you don't know how to access to that file or you can't see any useful information about the sending process on that log file, **you need to contact with the support staff of your SMTP server** to ask them for the information.

= I'm using Gmail SMTP server and all my emails are sent with my Gmail account address in the from address field even when I have another email in 'From Email Address', why? =

Gmail/Google Apps (and probably other servers too) only allows you to send emails using your account email address in the FROM header.

= My emails are sent, debug log looks ok, but they're lost in the cyberspace, never reach the destination! Why life is so cruel with me? I'm going to cry! =

Be happy man, life is life... Sending an email sucessfully does not guarantee you that it will reach the destination, an email goes thru many email servers before reach the recipient email inbox. And finally, if your email reach the server that handles the inbox for the destination email address, it's this server who has the last word to decide if your email is going to be delivered to the recipient or not.

Lots of things can be considered to reject your emails in destination without any notice: Content of the email triggering spam filters (i.e. too many links in your email content) or recipient server policy, bad reputation of your domain or SMTP IP, missing recommendations (i.e. SPF record)... It's a whole world man!

Services like http://mandrill.com/ or https://sendgrid.com/ can help you to improve your email delivery.

= What means error messages displayed on send email test screen? =

SMTP Error: Could not authenticate -> This indicates the server refused your authentication data, probably due to incorrect username or password, but other incorrect settings can cause this too (like a bad port or encryption). Double check you have entered correct information in settings and contact with your SMTP server support if all is ok from your side.

SMTP connect() failed -> This indicates WordPress was not able to connect with your SMTP server. Probably you have an error in the hostname, port or encryption settings. This error can happen also if your web hosting is blocking connections to your SMTP host or your SMTP host is blocking your for some reason.

= My emails always have the site name as from name, FROM Name in settings is not being used, why? =

As you know this plugin is made to be friendly with other plugins that makes changes to the WordPress default settings, respecting changes made by these third-party plugins.

Therefore the FROM Name setting is only used when the email has the default value for this field: **WordPress**

An example of plugin that makes your emails to be sent with the site name is BuddyPress (tested with BP 2.2.1).

== Changelog ==

= 1.0.6 =

* Added Send Email Test page in Tools menu. Allowing you to test if WordPress is able to send emails using the SMTP server details provided.
* Changed the hook to phpmailer_init to very low priority to ensure we run after any other.
* Changed size of the username field.
* Changed checking for default $phpmailer->From and $phpmailer->FromName to do it separately to handle situations where only one of them is default (i.e. using BuddyPress).
* Updated FAQ and settings screen with more information.

= 1.0.1 =

* Created Miscellaneous Settings section and moved here Debug Mode, plus some other minor changes in settings screen.
* Added custom capability to allow select what roles/users can access to plugin settings.

= 1.0 =

* First public release.

