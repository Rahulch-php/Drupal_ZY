<div class="landing_selector">
<div class="selector_top">
<h3><?php 
$logo = theme_get_setting('logo'); 
$site_title = variable_get('site_name', '');

print t('Are you a Healthcare Professional?');?></h3>
<?php print drupal_render($form['terms'])?>
<?php print drupal_render($form['profession'])?>
<?php print drupal_render($form);?>
</div>
<div class="selector_bot">&nbsp;</div>
</div>

<div id="hcpexit" style="display: none;" >
<div class="exit">
<div id="page_container">
  <div id="header"><img border="0" src="<?php print check_url($logo); ?>" alt="<?php print $site_title?>" /></div>
  <div id="content">
    <p><?php print t('you are confirming you are not a healthcare professional and you will be directed to 
    http://www.janssen.co.uk/. Click OK if you would like to proceed or cancel if you would 
    like to go back to the HCP authentication page.'); ?></p>
    <p><a href="#" onclick="parent.location ='http://www.janssen.co.uk'">
<img alt="ok" title="<?php print t('ok'); ?>" src="<?php print drupal_get_path('theme', 'zytiga_uk')?>/images/btn_ok.gif" />
</a>
<a href="#" onclick="parent.location ='hcp'">
<img alt="cancel" title="<?php print t('cancel'); ?>"  src="<?php print drupal_get_path('theme', 'zytiga_uk')?>/images/btn_cancel.gif" />
</a></p>
  </div>
  <div id="footer">&nbsp;</div>
</div>
</div>
</div>