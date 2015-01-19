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
* Option to enable debug mode (logs sending process to your server PHP's error_log file).
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

If you're having trouble sending your emails, you can activate the debug mode in settings page and **most of the time** you will find useful information in your PHP error_log file.

If you don't know how to access to that file or you can't see any useful information about the sending process on that log file, **you need to contact with the support staff of your SMTP server**.

= I'm using Gmail SMTP server and all my emails are sent with my Gmail account address in the from address field even when I have another email in 'From Email Address', why? =

Gmail/Google Apps (and probably other servers too) only allows you to send emails using your account email address in the FROM header.

= My emails are sent, debug log looks ok, but they're lost in the cyberspace, never reach the destination! Why life is so cruel with me? I'm going to cry! =

Be happy man, life is life... Sending an email sucessfully does not guarantee you that it will reach the destination, an email goes thru many email servers before reach the recipient email inbox. And finally, if your email reach the server that handles the inbox for the destination email address, it's this server who has the last word to decide if your email is going to be delivered to recipient or not.

Services like http://mandrill.com/ or https://sendgrid.com/ can help you to improve your email delivery.

== Changelog ==

= 1.0 =

* First public release.

