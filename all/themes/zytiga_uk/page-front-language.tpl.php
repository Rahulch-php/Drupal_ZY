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
<body <?php print phptemplate_body_class('', '', 'choose_country choose_inner'); ?>>
<div id="page_container">
  <!-- Header starts here -->
  <div id="header">
    <div id="header_left"><img id="logo" alt="Janssen" title="<?php print t('Janssen'); ?>" src="<?php print base_path().path_to_theme() ?>/images/logo.gif" />
        </div>
    <div id="header_right">
      <ul>
        <li>
          <ul class="srch_container">
            <li class="talign"><?php print t('Text size'); ?></li>
            <li><a href="javascript:void(0)" class="small" id="txtsmall">-A</a></li>
            <li><a href="javascript:void(0)" class="medium" id="txtnormal">A</a></li>
            <li><a href="javascript:void(0)" class="large" id="txtbig">+A</a></li>
          </ul>
        </li>
        <li>
          <ul class="navigation">
            <li class="col1">
              <?php if (isset($primary_links)) : ?>
              <?php print theme('links', $primary_links, array('class' => 'nav_primary primary-links')) ?>
              <?php endif; ?>
            </li>
            <li class="col2">
              <ul class="nav_secondary">
               <?php print $home_header_menu; ?>
               </ul>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
  <!-- Header Ends here -->
  <!-- Content starts here -->
   <div id="content">
   <?php if (!empty($messages)): ?>
      <div id="messages">
        <div id="messages-close"></div>
        <?php print $messages; ?>
      </div>
      <?php endif; ?>
          <?php print drupal_get_form("language_selection_form");?>
   </div>
  
  <!-- Content Ends here -->
  <!-- Footer starts here -->
  <div id="footer">
    <div class="main_footer"><?php print $footer; ?></div>
  </div>
  <!-- Footer Ends here -->
</div>
<?php print $closure ?>
</body>
</html>
