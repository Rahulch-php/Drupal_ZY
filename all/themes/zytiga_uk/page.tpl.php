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
<body <?php if($right): ?> class="threecol" <?php endif; ?>>
<div id="page_container">
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
  <!--  breadcrumb -->
  <?php print $breadcrumb; ?>
  <!--  breadcrumb --></div>
  <!--Header Container ends here-->
  
  <!--Content Container starts here-->
  <div id="content">
   <?php if ($left): ?>
    <div id="navigation">      
      <?php print $left;?>
    </div>
    <?php endif; ?>
    <div <?php if ($left): ?> id="main_content" <?php else: ?> id="no_left" <?php endif; ?>>
     <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block">'; endif; ?>
     <?php if ($tabs): print '<ul class="tabs primary">'. $tabs .'</ul></div>'; endif; ?>
    <?php if (!empty($messages)): ?>
      <div id="messages">
        <div id="messages-close"></div>
        <?php print $messages; ?>
      </div>
      <?php endif; ?>
      <?php if($searchblock): 
		print $searchblock;
       endif; ?>
       <?php  print $content ?>
    </div>
    <?php if ($right): ?>
    <!--Rightnav Container starts here-->
    <div id="rightnav_container">
      <?php print $right; ?>
    </div>
    <!--Rightnav Container ends here-->
    <?php endif; ?>
  </div>
  <div id="ftr_top">&nbsp;</div>
  <!--Content Container ends here-->
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
