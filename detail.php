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
	
	<title> <?php echo strip_tags($conf['title'])?> — <?php echo hsc(tpl_img_getTag('IPTC.Headline',$IMG))?></title>
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
			<!-- CONTENT -->
			<div id="weltis__detail"><div class="content">
				<?php html_msgarea() ?>
				
				<?php if(!$ERROR): ?>
					<div class="pageId"><span><?php echo hsc(tpl_img_getTag('IPTC.Headline',$IMG)); ?></span></div>
				<?php endif; ?>
				
				<div class="page group" style="text-align: center">
					<?php tpl_flush() ?>
					<?php tpl_includeFile('pageheader.html') ?>
					
					<!-- detail start -->
					<?php if($ERROR): echo '<h1>'.$ERROR.'</h1>'; else: ?>
					
					<?php if($REV) echo p_locale_xhtml('showrev');?>
					<h1><?php echo nl2br(hsc(tpl_img_getTag('simple.title'))); ?></h1>
					
					<?php tpl_img(900,700); /* parameters: maximum width, maximum height (and more) */ ?>
					
					<div class="img_detail">
						<?php tpl_img_meta(); ?>
						
						<dl>
							<?php
							echo '<dt>'.$lang['reference'].':</dt>';
							$media_usage = ft_mediause($IMG,true);
							if(count($media_usage) > 0){
								foreach($media_usage as $path){
									echo '<dd>'.html_wikilink($path).'</dd>';
								}
							}else{
								echo '<dd>'.$lang['nothingfound'].'</dd>';
							}
							?>
						</dl>
						<p><?php echo $lang['media_acl_warning']; ?></p>
					</div>
					
					<?php endif; ?>
					<!-- detail stop -->
					
					<?php tpl_includeFile('pagefooter.html') ?>
				</div>
				
				<!--
				<div class="docInfo"><?php tpl_pageinfo() ?></div>
				-->
				
				<?php tpl_flush() ?>
			</div></div>

			<!-- PAGE ACTIONS -->
<!--			<?php if (!$ERROR): ?>
				<div id="dokuwiki__pagetools">
					<h3 class="a11y"><?php echo $lang['page_tools']; ?></h3>
					<div class="tools">
						<ul>
							<?php
								$data = array(
									'view' => 'detail',
									'items' => array(
										'mediaManager' => tpl_action('mediaManager', true, 'li', true, '<span>', '</span>'),
										'img_backto' =>   tpl_action('img_backto',   true, 'li', true, '<span>', '</span>'),
									)
								);

								// the page tools can be amended through a custom plugin hook
								$evt = new Doku_Event('TEMPLATE_PAGETOOLS_DISPLAY', $data);
								if($evt->advise_before()) {
									foreach($evt->data['items'] as $k => $html) echo $html;
								}
								$evt->advise_after();
								unset($data);
								unset($evt);
							?>
						</ul>
					</div>
				</div>
			<?php endif; ?>
-->		</div></div>

		<?php include('tpl_footer.php') ?>
	</div></div>

</body>

</html>
