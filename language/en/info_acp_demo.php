<?php
/**
 *
 * Jmz Rotate Ads. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2016, Jmz Software, https://jmzsoftware.com
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'ACP_DEMO_TITLE'			=> 'Demo Module',
));
