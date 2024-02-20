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

$hasSidebar = page_findnearest($conf['sidebar']);
$showSidebar = $hasSidebar && ($ACT=='show');
?>

<!DOCTYPE html>

<html lang="<?php echo $conf['lang'] ?>" dir="<?php echo $lang['direction'] ?>" class="no-js">

<head>
	<meta charset="utf-8" />
	
	<title> <?php echo strip_tags($conf['title']) ?> — <?php tpl_pagetitle() ?> </title>
	<script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
	<?php tpl_metaheaders() ?>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	
	<?php echo tpl_favicon(array('favicon', 'mobile')) ?>
	<?php tpl_includeFile('meta.html') ?>
</head>

<body class="weltis">
	<div id="weltis__site"><div id="dokuwiki__top">
		<?php include('tpl_header.php') ?>
		
		<!-- MAIN -->
		<div id="weltis__main"><div class="wrapper group">
			<!-- ASIDE -->
			<?php if($showSidebar): ?>
				<div id="weltis__aside"><div class="aside">
					<?php tpl_flush() ?>
					<?php tpl_includeFile('sidebarheader.html') ?>
					<?php tpl_include_page($conf['sidebar'], true, true) ?>
					<?php tpl_includeFile('sidebarfooter.html') ?>
				</div></div>
			<?php endif; ?>
			
			<!-- CONTENT -->
			<div id="weltis__content"><div class="content">
				<?php html_msgarea() ?>
				
				<div class="pageId"><span><?php echo hsc($ID) ?></span></div>
				
				<div class="page group">
					<?php tpl_flush() ?>
					<?php tpl_includeFile('pageheader.html') ?>
					<!-- wikipage start -->
					<?php tpl_content() ?>
					<!-- wikipage stop -->
					<?php tpl_includeFile('pagefooter.html') ?>
				</div>
				
				<div class="docInfo"><?php tpl_pageinfo() ?></div>
				
				<?php tpl_flush() ?>
			</div></div>
			
			<!-- ACTION TOP -->
			<div id="action__top">
				<?php
				$actionIcon = tpl_getMediaFile(array('images/goup.png'), false);
				
				tpl_action('top', true, false, false, '<img src="'.$actionIcon.'" width="32" height="32"/><span>','</span>');
				?>
			</div>
		</div></div>
		
		<?php include('tpl_footer.php') ?>
	</div></div>

	<div class="no"><?php tpl_indexerWebBug() /* provide DokuWiki housekeeping, required in all templates */ ?></div>
	<div id="screen__mode" class="no"></div><?php /* helper to detect CSS media query in script.js */ ?>
</body>

</html>
