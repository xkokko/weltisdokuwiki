<?php
/**
 * Official Weltis Dokuwiki Template 2024
 *
 * @link     https://github.com/xkokko/weltisdokuwiki
 * @author   Cosmo Cocconcelli <c.wiki@drw.ng>
 * @license  MIT License (https://github.com/xkokko/weltisdokuwiki/blob/main/LICENSE)
 */

/* must be run from within DokuWiki */
if (!defined('DOKU_INC')) die();
header('X-UA-Compatible: IE=edge,chrome=1');

?>

<!DOCTYPE html>

<html lang="<?php echo $conf['lang'] ?>" dir="<?php echo $lang['direction'] ?>" class="no-js">

<head>
	<meta charset="utf-8" />
	
	<title> <?php echo strip_tags($conf['title'])?> — <?php echo hsc($lang['mediaselect'])?></title>
	<script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
	<?php tpl_metaheaders() ?>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	
	<?php echo tpl_favicon(array('favicon', 'mobile')) ?>
	<?php tpl_includeFile('meta.html') ?>
</head>

<body class="weltis">
	<div id="media__manager">
		<?php html_msgarea() ?>
		
		<div id="mediamgr__aside"><div class="pad">
			<h1><?php echo hsc($lang['mediaselect'])?></h1>

			<?php /* keep the id! additional elements are inserted via JS here */?>
			<div id="media__opts"></div>

			<?php tpl_mediaTree() ?>
		</div></div>

		<div id="mediamgr__content"><div class="pad">
			<?php tpl_mediaContent() ?>
		</div></div>
	</div>
</body>

</html>
