<h1 class="resources"> <img hspace="10" align="absMiddle" alt="Resources" src="<?php print file_directory_path()?>/icon_resources.gif""><?php print t('Resources'); ?></h1>
      <hr />
      <div id="search_container">
        <h3><?php print t('Search');?>
        <?php if(empty($_REQUEST['search_term'])) {?>
         <?php print t('<span>or browse through all of the latest resources available for prostate cancer and ZYTIGA<sup>&trade;</sup></span>'); ?>
        <?php }?></h3>       
          <?php print drupal_render($form['type'])?>
          <?php print drupal_render($form['search_term'])?>
      
        <?php 
        drupal_render($form['submit']);
        ?>
        <input type="image" class="resource-submit-bt" src="<?php print drupal_get_path('theme', 'zytiga_uk')?>/images/btn_search.gif" name="search" />
        <?php 
        print drupal_render($form);?>
      </div>