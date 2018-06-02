<div class="landing_selector">
<div class="selector_top">
<h3><?php print t('Are you a Healthcare Professional?');?></h3>
<?php print drupal_render($form['terms'])?>
<?php print drupal_render($form['profession'])?>
<?php print drupal_render($form);?>
</div>
<div class="selector_bot">&nbsp;</div>
</div>

<div id="hcpexit" style="display: none;" >
  <div style="background-image: url('<?php print drupal_get_path('theme', 'zytiga_uk')?>/images/hcpbg.png');background-repeat:no-repeat; width: 532px;height: 287px ">
  <div style="padding: 120px 30px 1px 30px;color: #4d4e53;font-family:Georgia; size: 14px; line-height: 18px; ">
  <p><?php print t('you are confirming you are not a healthcare professional and you will be directed to 
    http://www.janssen.co.uk/. Click OK if you would like to proceed or cancel if you would 
    like to go back to the HCP authentication page.'); ?></p>
  <div  style="padding: 0px 30px 0px 150px;"><p>
<a href="#" onclick="parent.location ='http://www.janssen.co.uk'">
<img alt="ok" title="<?php print t('ok'); ?>" src="<?php print drupal_get_path('theme', 'zytiga_uk')?>/images/btn_ok.gif" />
</a>
<a href="#" onclick="parent.location ='hcp'">
<img alt="cancel" title="<?php print t('cancel'); ?>"  src="<?php print drupal_get_path('theme', 'zytiga_uk')?>/images/btn_cancel.gif" />
</a>
</p></div>
</div>
</div>
</div>