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
  <div id="bghome_wrapper">
    <div id="home_wrapper">
  <!--Header Container starts here-->
  <div id="header">
    <div class="logo_container"><a href="<?php print base_path();?>home" title="<?php print t('Zytiga'); ?>">
     <?php 
    // Prepare header
          $site_fields = array();
          if ($site_name) {
            $site_fields[] = check_plain($site_name);
          }
          if ($site_slogan) {
            $site_fields[] = check_plain($site_slogan);
          }
          $site_title = implode(' ', $site_fields);
          if ($site_fields) {
            $site_fields[0] = '<span>'. $site_fields[0] .'</span>';
          }
          $site_html = implode(' ', $site_fields);
    if ($logo) {
              print '<img src="'. check_url($logo) .'" alt="'. $site_title .'"/>';
            }?>
    
    </a></div>
    <div class="welcome_user">
    	<?php print $header_bottom;?>
    </div>
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
      <?php  $swfFile = $node->field_akamai_url[0]['value'];  ?>
     <div id="mediaplayer"></div>
 	<script type="text/javascript" src="/<?php print path_to_theme() . '/js/'?>jwplayer.js"></script>
	<script type="text/javascript">
		jwplayer("mediaplayer").setup({
			flashplayer: "/<?php print file_directory_path() . '/videos/'; ?>player.swf",
			file: "<?php print $swfFile; ?>",
			height: "258",
			width: "437",
			image: "<?php print '/' . $node->field_video_thumbnail[0]['filepath']; ?>"
		});
	</script>
      </div>
    </div>
  </div>
  <!--Content Container ends here-->
  <!--Large menus Container starts here-->  
  <!--  Wrappers  -->
  </div>
  </div>
  <!--  Wrappers  end-->
  <div id="menu_large1">
    <?php print $home_footer_block; ?>
  </div>
  <div id="menu_large2">
    <?php print $home_footer_menu; ?>
  </div>
  <!--Large menus Container ends here-->
  <!--Content Container ends here-->
  <!--Footer Container starts here-->
  <div id="footer">
    <ul>
      <li><?php print $left_logo; ?></li>      
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
      <li><?php print $right_logo; ?></li>
      </ul>
    <p><?php print $footer;?></p>
  </div>
  <!--Footer Container ends here-->
</div>
<div class="clear">&nbsp;</div>
<?php print $closure ?>
</body>
</html>
