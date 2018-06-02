<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>">
  <head>
    <title><?php print $head_title ?></title>
    <?php print $head ?>
    <?php print $styles ?>
    <?php print $scripts ?>
    <!--[if lt IE 7]>
      <?php print $ie_styles ?>
    <![endif]-->
    <!--[if gte IE 6]>
      <?php print $ie_styles ?>
    <![endif]-->
  </head>
<body<?php print itsadmin_body_class($left, $right); ?>>
<!-- Layout -->
    <div id="header">
	  <p align="left" style="background:#fff;">
	  <img alt="ITS Logo" src="<?php print base_path() . path_to_theme();?>/images/ITPT_itlogo.gif"/>
	  </p>
      <div id="go-home"  >
        <a href="<?php print base_path() ?>"><?php print t('Go Back to Homepage') ?></a>
      </div>
      <div id="admin-links">
        <?php print _itsadmin_admin_links(); ?>
      </div>
      <div id="header-title">
		<strong>Johnson & Johnson ITS</strong>
      </div>
    </div>
    <?php print $header ?>
  <div id="navigation">
    <?php print _itsadmin_admin_navigation(); ?>
  </div>

  <div id="breadcrumb">
    <?php if ($title): print '<h2'. ($tabs ? ' class="with-tabs"' : '') .'>'. $title .'</h2>'; endif; ?>
    <?php print $breadcrumb; ?>
  </div>
  
  <div id="content-wrap">
    <div id="inside">
      <?php $extclass = ''; ?>      
      <?php if (arg(0) == 'admin' AND (arg(2)) || $left) { ?>
        <div id ="sidebar-left">
          <?php
          $menu = menu_navigation_links('navigation', 2);
          print theme('primary_links', $menu, array('id' => 'itsadmin-menu'));
          print $left;
          ?>
        </div>
      <?php } ?>
      <div id="content">
        <div class="t"><div class="b"><div class="l"><div class="r"><div class="bl"><div class="br"><div class="tl"><div class="tr"><div class="content-in">
          <?php if (isset($tabs) && $tabs): print '<div id="tabs-primary"><ul class="tabs primary">'. $tabs .'</ul></div><div class="level-1">'; endif; ?>
          <?php if (isset($tabs2) && $tabs2): print '<div id="tabs-secondary"><ul class="tabs secondary">'. $tabs2 .'</ul></div><div class="level-2">'; endif; ?>
          <?php print $help ?>
          <?php print $messages ?>
          <?php print $content ?>
          <?php if (isset($tabs2) && $tabs2): print '</div>'; endif; ?>
          <?php if (isset($tabs) && $tabs): print '</div>'; endif; ?>
        </div></div></div></div></div></div></div></div></div>
      </div>
    </div>
  </div>
    <div id="footer">
          <?php if ($footer) { ?>
	    <?php print $footer; ?>
	  <?php } ?>
	  <br/>&copy; <?php print date("Y"); ?>. Johnson & Johnson ITS <br/> 	  
    </div>
   <!-- layout -->
  <?php print $closure ?>
  </body>
</html>
