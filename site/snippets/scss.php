<?php

/**
 * SCSS Snippet
 * @author    Bart van de Biezen <bart@bartvandebiezen.com>
 * @link      https://github.com/bartvandebiezen/kirby-v2-scssphp
 * @return    CSS and HTML
 * @version   1.0.1
 */

use Leafo\ScssPhp\Compiler;

// Using realpath seems to work best in different situations.
$root = realpath(__DIR__ . '/../..');

// Set file paths. Used for checking and updating CSS file for current template.
$template     = $page->template();
$SCSS         = $root . '/assets/scss/' . $template . '.scss';
$CSS          = $root . '/assets/css/'  . $template . '.css';
$CSSKirbyPath = 'assets/css/' . $template . '.css';
$siteSettings = $root . '/content/site.txt';

// Set default SCSS if there is no SCSS for current template. If template is default, skip check.
if ($template == 'default' or !file_exists($SCSS)) {
	$SCSS         = $root . '/assets/scss/default.scss';
	$CSS          = $root . '/assets/css/default.css';
	$CSSKirbyPath = 'assets/css/default.css';
}

// For when the plugin should check if partials are changed. If any partial is newer than the main SCSS file, the main SCSS file will be 'touched'. This will trigger the compiler later on, on this server and also on another environment when synced.
if (c::get('scssNestedCheck')) {
	$SCSSDirectory = $root . '/assets/scss/';
	$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($SCSSDirectory));
	foreach ($files as $file) {
		if (pathinfo($file, PATHINFO_EXTENSION) == "scss" && filemtime($file) > filemtime($SCSS)) {
			touch ($SCSS);
			clearstatcache();
			break;
		}
	}
}

// Get file modification times. Used for checking if update is required and as version number for caching.
$SCSSFileTime = filemtime($SCSS);
$CSSFileTime = filemtime($CSS);
$siteSettingsTime = filemtime($siteSettings);

// Wrap String with ""
function str_wrap($string = '', $char = '"')
{
    return str_pad($string, strlen($string) + 2, $char, STR_PAD_BOTH);
}

	// Update CSS when needed.
	if (!file_exists($CSS) or $SCSSFileTime > $CSSFileTime or $siteSettingsTime > $CSSFileTime) {
		// Activate library.
		require_once $root . '/site/plugins/scssphp/scss.inc.php';
		$parser = new Compiler();

		// Setting compression provided by library.
		$parser->setFormatter('Leafo\ScssPhp\Formatter\Compressed');

		// Setting relative @import paths.
		$importPath = $root . '/assets/scss';
		$parser->addImportPath($importPath);

		// Place SCSS file in buffer.
		$buffer = file_get_contents($SCSS);

		// Define Skin - Dark or Light
		$skinLight = 'false';
		
		if( $site->skin() == '1' ) {
			$skinLight = 'false';
			// $skinLight = false;
		} else {
			$skinLight = 'true';
			// $skinLight = true;
		}

		// Variables
		$parser->setVariables(array(
			'sans-serif-1' => str_wrap( preg_replace('/[+]/', ' ', $site->fontheadings()) ),
			'sans-serif-2' => str_wrap( preg_replace('/[+]/', ' ', $site->fontbody()) ),
			'ca1' => $site->ca1(),
			'ca2' => $site->ca2(),
			// 'light' => 'false !default'
			'light' => $skinLight
			// 'light' => $site->skin() . ' !default'
		));

		// Compile content in buffer.
		$buffer = $parser->compile($buffer);

		// Minify the CSS even further.
		require_once $root . '/site/plugins/scssphp/minify.php';
		$buffer = minifyCSS($buffer);

		// Update CSS file.
		file_put_contents($CSS, $buffer);

	}
?>

<link rel="stylesheet" property="stylesheet" href="<?php echo url($CSSKirbyPath) ?>?version=<?php echo $CSSFileTime ?>">
