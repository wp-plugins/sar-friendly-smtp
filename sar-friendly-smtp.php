<?php
/*
Plugin Name: SAR Friendly SMTP
Plugin URI: http://www.samuelaguilera.com
Description: A friendly SMTP plugin for WordPress. No third-party, simply using WordPress native possibilities.
Author: Samuel Aguilera
Version: 1.0
Author URI: http://www.samuelaguilera.com
License: GPL3
*/

/*
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License version 3 as published by
the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

if ( !defined( 'ABSPATH' ) ) { exit; }

// Current plugin version
define('SAR_FSMTP_VER', 1.0);

$sarfsmtp_options = get_option( 'sarfsmtp_settings' );
require('includes/options.php');

add_action('phpmailer_init','sar_friendly_smtp');

function sar_friendly_smtp ($phpmailer) {

	global $sarfsmtp_options;

	// If server name or password are empty, don't touch anything!
	if ( empty( $sarfsmtp_options['smtp_server'] ) || empty( $sarfsmtp_options['password'] ) ) { return; }

	$phpmailer->IsSMTP();
	$phpmailer->SMTPAuth = true;
	$phpmailer->Username = $sarfsmtp_options['username'];
	$phpmailer->Password = $sarfsmtp_options['password'];
	$phpmailer->Host = $sarfsmtp_options['smtp_server'];
	$phpmailer->Port = $sarfsmtp_options['port'];
	$phpmailer->SMTPSecure = $sarfsmtp_options['encryption'];
	$phpmailer->XMailer = 'SAR Friendly SMTP '.SAR_FSMTP_VER.' - WordPress Plugin';

	// Be friendly with other plugins that may replace FROM field (i.e. Gravity Forms)
	$wp_email_start = substr( $phpmailer->From, 0, 9 );	

	if ( $wp_email_start === 'wordpress' && $phpmailer->FromName === 'WordPress' ) { 
		if ( !empty( $sarfsmtp_options['from_address'] ) ) { $phpmailer->From = $sarfsmtp_options['from_address']; }
		if ( !empty( $sarfsmtp_options['from_name'] ) ) { $phpmailer->FromName = $sarfsmtp_options['from_name']; }
	}

	// Debug mode
	if ( $sarfsmtp_options['debug_mode'] == 'error_log' ) {
		$phpmailer->SMTPDebug = 2;
		$phpmailer->Debugoutput = 'error_log';
	}

}

?>