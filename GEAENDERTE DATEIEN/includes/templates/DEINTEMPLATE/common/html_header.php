<?php
/**
 * Zen Cart German Specific (158 code in 157 / zencartpro adaptations)
 * Common Template
 *
 * outputs the html header. i,e, everything that comes before the \</head\> tag
 *
 * @copyright Copyright 2003-2023 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: html_header.php for Tabbed Products Pro 2023-12-08 19:16:39Z webchills $
 */
if (!defined('IS_ADMIN_FLAG')) {
    die('Illegal Access');
}

$zco_notifier->notify('NOTIFY_HTML_HEAD_START', $current_page_base, $template_dir);

// Prevent clickjacking risks by setting X-Frame-Options:SAMEORIGIN
header('X-Frame-Options:SAMEORIGIN');

/**
 * load the module for generating page meta-tags
 */
require(DIR_WS_MODULES . zen_get_module_directory('meta_tags.php'));
/**
 * output main page HEAD tag and related headers/meta-tags, etc
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php echo HTML_PARAMS; ?>>
<head>
<?php
// -----
// Provide a notification that the <head> tag has been rendered for the current page; some scripts need to be
// inserted just after that tag's rendered.
//
$zco_notifier->notify('NOTIFY_HTML_HEAD_TAG_START', $current_page_base);
?>
<meta charset="<?php echo CHARSET; ?>" />
<link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
<link rel="dns-prefetch" href="https://code.jquery.com">
<title><?php echo META_TAG_TITLE; ?></title>

<meta name="keywords" content="<?php echo META_TAG_KEYWORDS; ?>" />
<meta name="description" content="<?php echo META_TAG_DESCRIPTION; ?>" />
<meta name="language" content="<?php echo META_TAG_LANGUAGE; ?>" />
<meta http-equiv="imagetoolbar" content="no" />
<meta name="author" content="<?php echo STORE_NAME ?>" />
<meta name="generator" content="Zen-Cart - deutsche Version, https://www.zen-cart-pro.at" />
<?php if (defined('ROBOTS_PAGES_TO_SKIP') && in_array($current_page_base,explode(",",constant('ROBOTS_PAGES_TO_SKIP'))) || $current_page_base=='down_for_maintenance' || $robotsNoIndex === true) { ?>
<meta name="robots" content="noindex, nofollow" />
<?php } ?>

<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes"/>

<?php if (defined('FAVICON')) { ?>
<link rel="icon" href="<?php echo FAVICON; ?>" type="image/x-icon" />
<link rel="shortcut icon" href="<?php echo FAVICON; ?>" type="image/x-icon" />
<?php } //endif FAVICON ?>

<base href="<?php echo (($request_type == 'SSL') ? HTTPS_SERVER . DIR_WS_HTTPS_CATALOG : HTTP_SERVER . DIR_WS_CATALOG ); ?>" />
<?php if (isset($canonicalLink) && $canonicalLink != '') { ?>
<link rel="canonical" href="<?php echo $canonicalLink; ?>" />
<?php } ?>
<?php
// BOF hreflang for multilingual sites
if (!isset($lng) || (isset($lng) && !is_object($lng))) {
  $lng = new language;
}
if (count($lng->catalog_languages) > 1) {
  foreach($lng->catalog_languages as $key => $value) {
    echo '<link rel="alternate" href="' . ($this_is_home_page ? zen_href_link(FILENAME_DEFAULT, 'language=' . $key, $request_type, false) : $canonicalLink . (strpos($canonicalLink, '?') ? '&amp;' : '?') . 'language=' . $key) . '" hreflang="' . $key . '" />' . "\n";
  }
}
// EOF hreflang for multilingual sites
?>
<?php
$manufacturers_id = (isset($_GET['manufacturers_id'])) ? $_GET['manufacturers_id'] : '';
?>
<?php if (RSS_FEED_ENABLED == 'true'){ ?>
<?php echo rss_feed_link_alternate();?>
<?php } ?>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha384-1H217gwSVyLSIfaLxHbE7dRb3v4mYCKbpQvzx0cegeju1MVsGrX5xXxAvs/HgeFs" crossorigin="anonymous"></script>
<script type="text/javascript">window.jQuery || document.write(unescape('%3Cscript type="text/javascript" src="<?php echo $template->get_template_dir('.js',DIR_WS_TEMPLATE, $current_page_base,'jscript'); ?>/jquery.min.js"%3E%3C/script%3E'));</script>

<?php
/**
* load the loader files
*/

if($RI_CJLoader->get('status') && (!isset($Ajax) || !$Ajax->status())){
	$RI_CJLoader->autoloadLoaders();
	$RI_CJLoader->loadCssJsFiles();
	$files = $RI_CJLoader->header();
	foreach($files['css'] as $file)
		if($file['include']) {
      include($file['src']);
    } else if (!$RI_CJLoader->get('minify_css')) {
      echo "<link rel=\"stylesheet\" type=\"text/css\" href='{$file['src']}' />\n";
    } else {
      echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"extras/min/?f={$file['src']}&amp;".$RI_CJLoader->get('minify_time')."\" />\n";
    }
		
	foreach($files['jscript'] as $file)
		if($file['include']) {
      include($file['src']);
    } else if(!$RI_CJLoader->get('minify_js')) {
      echo "<script type='text/javascript' src='{$file['src']}'></script>\n";
    } else {
      echo "<script type=\"text/javascript\" src=\"extras/min/?f={$file['src']}&amp;".$RI_CJLoader->get('minify_time')."\"></script>\n";
    }
}
?>
<?php require($template->get_template_dir('super_data_head.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/super_data_head.php'); ?>
<?php
  $zco_notifier->notify('NOTIFY_HTML_HEAD_END', $current_page_base);
?>
</head>
<?php // NOTE: Blank line following is intended: ?>

