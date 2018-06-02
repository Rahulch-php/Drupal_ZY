<?php
// $Id: page.tpl.php,v 1.18.2.1 2009/04/30 00:13:31 goba Exp $
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
<head>
<?php print $head ?>
    <title><?php print $head_title ?></title>
    <?php print $styles ?>
    <?php print $scripts ?>
    <!--[if lt IE 7]>
      <?php print phptemplate_get_ie_styles(); ?>
    <![endif]-->
</head>
<body <?php print phptemplate_body_class('', '', 'home'); ?>>
<div id="page_container">
  <!--Header Container starts here-->
  <div id="header">
    <div class="logo_container"><a href="<?php print base_path();?>home" title="<?php print t('Renewedhopepc.com'); ?>"><img src="<?php print base_path().path_to_theme()?>/images/logo_web.gif" alt="Renewedhopepc.com" title="<?php print t('Renewedhopepc.com'); ?>" /></a></div>
  </div>
  <!--Header Container ends here-->
  <!--Content Container starts here-->
  <div id="content">
    <div id="navigation">
      <?php print $left;?>
    </div>
    <div id="main_content">
      <h1><?php print $node->title; ?></h1>
      <hr />
      <p><?php print $node->content['body']['#value']; ?></p>
      <div id="flash_content">
      <?php  $swfFile = $node->field_video_url[0]['value']; ?>
     <div id="mediaplayer"></div>
 	<script type="text/javascript" src="/<?php print path_to_theme() . '/js/'?>jwplayer.js"></script>
	<script type="text/javascript">
		jwplayer("mediaplayer").setup({
			flashplayer: "/<?php print file_directory_path() . '/videos/'; ?>player.swf",
			file: "<?php print $swfFile; ?>",
			height: "258",
			width: "446",
			image: "<?php print base_path().path_to_theme(). '/images/video_image.jpg'; ?>"
		});
	</script>
      </div>
      </div>
  </div>
  <!--Content Container ends here-->
  <!--Large menus Container starts here-->
  <div id="menu_large1">
    <p><?php print t('ZYTIGA<sup>&trade;</sup> in combination with prednisone is indicated for the treatment of patients with metastatic castration-resistant prostate cancer (CRPC) who have received prior chemotherapy containing docetaxel.'); ?></p>
  </div>
  <div id="menu_large2">
    <?php print $home_footer_block; ?>
  </div>
  <!--Large menus Container ends here-->
  <!--Content Container ends here-->
  <!--Footer Container starts here-->
  <div id="footer">
    <ul>
      <li><img src="<?php print base_path().path_to_theme()?>/images/logo_zytiga.gif" alt="Zytiga" title="<?php print t('Zytiga');?>" /></li>
       <li>
        <ul>
          <li class="col1">
      	<?php print $footer_menu1; ?>
          </li>
          <li class="col2">
      	<?php print $footer_menu2; ?>
          </li>
        </ul>
      </li>
      <li><img src="<?php print base_path().path_to_theme()?>/images/logo_janssen.gif" alt="Janssen" title="<?php print t('Janssen');?>" /></li>
    </ul>
    <p><?php print $footer;?></p>
  </div>
  <!--Footer Container ends here-->
</div>
<div class="clear">&nbsp;</div>
<?php print $closure ?>
</body>
</html>
