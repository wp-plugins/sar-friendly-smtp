=== SAR Friendly SMTP ===
Contributors: samuelaguilera
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=9E45TMW9JCPRW
Tags: email, smtp, notifications, phpmailer, sendmail, gmail, mandrill, wp_mail
Requires at least: 3.9.3
Tested up to: 4.1
Stable tag: 1.0
License: GPL3

A friendly SMTP plugin for WordPress. No third-party, simply using WordPress native possibilities.

== Description ==

There are A LOT of SMTP plugins for WordPress, some uses third-party libraries with no too much luck, others looks like the same plugin (almost identical source code) but with different name...

Most of them overwrites from address and from name fields ALWAYS, breaking functionality of some other plugins that send emails using wp_mail() function.

So the history repeats again, I can't find one simple plugin that fits my needs, so I created one for myself and share it with you in the hope that you'll find it useful (don't forget to give it a good rate if you like!).

= Features =

* KISS principle.
* No third-party libraries for SMTP, uses WordPress core.
* Respect fields modified by other plugins (i.e. Gravity Forms).
* Option to enable debug mode (logs communication with your SMTP server in PHP's error_log file, check [FAQ](https://wordpress.org/plugins/sar-friendly-smtp/faq/) for more details).
* Uses WordPress settings API for settings page, making it secure by default.

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

If you're having trouble sending your emails, you can activate the debug mode in settings page. That activates the logging of the communication between WordPress and your SMTP server, and **most of the time** you will find useful information in your PHP error_log file.

= Where can I find that PHP error log file? = 

The location of the PHP error_log file it's not the same in all servers, because it can be customized by the server admin. In all cases you'll need to use a (S)FTP client to check it. Example of possible locations:

* Some major shared hosting companies (i.e Hostgator), put this file in the root of your site (i.e. /public_html/ ) with the name of error_log
* Some other shared hostings put it inside of a "logs" directory in the root of your (S)FTP account.
* And unfortunatelly, there're some hosting companies that don't allow the user to access directly to this error log file. So you'll need to contact your hosting support.
* If you're using a VPS or dedicated server you know how to find this file! ;) The path of the file anyway is controled by error_log directive in php.ini or if you're using PHP-FPM by php_admin_value[error_log] in your pool .conf file.

If you don't know how to access to that file or you can't see any useful information about the sending process on that log file, **you need to contact with the support staff of your SMTP server** to ask them for the information.

= I'm using Gmail SMTP server and all my emails are sent with my Gmail account address in the from address field even when I have another email in 'From Email Address', why? =

Gmail/Google Apps (and probably other servers too) only allows you to send emails using your account email address in the FROM header.

= My emails are sent, debug log looks ok, but they're lost in the cyberspace, never reach the destination! Why life is so cruel with me? I'm going to cry! =

Be happy man, life is life... Sending an email sucessfully does not guarantee you that it will reach the destination, an email goes thru many email servers before reach the recipient email inbox. And finally, if your email reach the server that handles the inbox for the destination email address, it's this server who has the last word to decide if your email is going to be delivered to recipient or not.

Services like http://mandrill.com/ or https://sendgrid.com/ can help you to improve your email delivery.

== Changelog ==

= 1.0 =

* First public release.

