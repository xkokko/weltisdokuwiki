<?php
/**
 * Template header, included in the main and detail files
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();
?>

<!-- HEADER -->
<div id="weltis__header"><div class="header group">
	<?php tpl_includeFile('header.html') ?>
	
	<!-- HEADINGS -->
	<div class="headings group">
		<div class="titlehead group">
			<?php
				$logo = tpl_getMediaFile(array(':wiki:logo.png', ':logo.png', 'images/logo.png'), false, $logoSize);
				
				echo '<img class="logo" src="'.$logo.'" width="32" height="32"/>'
			?>
			<h1 class="title"><?php
				tpl_link(
					wl(),
					'<span>'.$conf['title'].'</span>',
					'accesskey="h" title="[H]"'
				);
			?></h1>
		</div>
		<?php if ($conf['tagline']): ?>
			<p class="tagline group"><?php echo $conf['tagline']; ?></p>
		<?php endif ?>
	</div>
	
	<!-- TOOLS -->
	<div class="tools group">
		<!-- USER TOOLS -->
		<?php if ($conf['useacl']): ?>
			<div id="weltis__usertools">
				<?php
				$userIcon = tpl_getMediaFile(array('images/user.png'), false);
				
				echo '<a class="menuhead" href="#"><img src="'.$userIcon.'" width="16" height="16"/></a>';
				?>
				<ul class="menulist">
					<?php if (!empty($_SERVER['REMOTE_USER'])): ?>
						<span class="user">
						<?php tpl_userinfo(); /* 'Logged in as ...' */ ?>
						</span>
					<?php endif ?>
					<?php
						tpl_toolsevent('usertools', array(
							tpl_action('admin', true, 'li', true),
							tpl_action('profile', true, 'li', true),
							tpl_action('register', true, 'li', true),
							tpl_action('login', true, 'li', true)
						));
					?>
				</ul>
			</div>
		<?php endif ?>
		
		<!-- SITE TOOLS -->
		<div id="weltis__sitetools">
			<?php
			$siteIcon = tpl_getMediaFile(array('images/site.png'), false);
			
			echo '<a class="menuhead" href="#"><img src="'.$siteIcon.'" width="16" height="16"/></a>';
			?>
			<ul class="menulist">
				<span><?php tpl_searchform(); ?></span>
				<?php
					tpl_toolsevent('sitetools', array(
						tpl_action('recent', true, 'li', true),
						tpl_action('media', true, 'li', true),
						tpl_action('index', true, 'li', true)
					));
				?>
			</ul>
		</div>
		
		<!-- PAGE TOOLS -->
		<div id="weltis__pagetools">
			<?php
			$pageIcon = tpl_getMediaFile(array('images/page.png'), false);
			
			echo '<a class="menuhead" href="#"><img src="'.$pageIcon.'" width="16" height="16"/></a>';
			?>
			<ul class="menulist">
				<?php
				//	tpl_toolsevent('pagetools', array(
				//		tpl_action('edit', true, 'li', true),
				//		tpl_action('revert', true, 'li', true),
				//		tpl_action('revisions', true, 'li', true),
				//		tpl_action('backlink', true, 'li', true),
				//		tpl_action('subscribe', true, 'li', true)
				//	));
					
					$data = array(
						'view'  => 'main',
						'items' => array(
							'edit'      => tpl_action('edit',      true, 'li', true, '<span>', '</span>'),
							'revert'    => tpl_action('revert',    true, 'li', true, '<span>', '</span>'),
							'revisions' => tpl_action('revisions', true, 'li', true, '<span>', '</span>'),
							'backlink'  => tpl_action('backlink',  true, 'li', true, '<span>', '</span>'),
							'subscribe' => tpl_action('subscribe', true, 'li', true, '<span>', '</span>')
						)
					);
					
					// the page tools can be amended through a custom plugin hook
					$evt = new Doku_Event('TEMPLATE_PAGETOOLS_DISPLAY', $data);
					if($evt->advise_before()){
						foreach($evt->data['items'] as $k => $html) echo $html;
					}
					$evt->advise_after();
					unset($data);
					unset($evt);
				?>
			</ul>
		</div>
	</div>
	
	<!-- BREADCRUMBS -->
	<?php if($conf['breadcrumbs'] || $conf['youarehere']): ?>
		<div class="breadcrumbs group">
			<?php if($conf['youarehere']): ?>
				<div class="youarehere"><?php tpl_youarehere() ?></div>
			<?php endif ?>
			<?php if($conf['breadcrumbs']): ?>
				<div class="trace"><?php tpl_breadcrumbs('—') ?></div>
			<?php endif ?>
		</div>
	<?php endif ?>
</div></div>

