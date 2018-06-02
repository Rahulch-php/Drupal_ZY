      <h1><?php print t('Send to a Colleague');?></h1>
      <hr />
      <div class="form">
        <p><?php print t('Email this page to a colleague. Please complete the form below and click "Send" at the bottom of the page.'); ?></p>
        <p><?php print t('By submitting an email address, you are requesting that we contact on your behalf the person you specify here. Your name and contact information and your colleague\'s contact information are required, but they will not be used other than to distribute the communication you request. By clicking on the "Send" button, you consent to the information being transferred to other countries that may not have the equivalent laws to protect such information.');?></p>
        <div class="form_elements">
          <p><?php print t('Fields marked <span>*</span> are mandatory.'); ?></p>
          <dl>
            <dt><?php print t('Your first name<span>*</span>:'); ?> </dt>
            <dd>
               <?php print drupal_render($form['message']['name'])?>
            </dd>
          </dl>
          <dl>
            <dt><?php print t('Your last name<span>*</span>:');?> </dt>
            <dd>
             <?php print drupal_render($form['lastname'])?>
            </dd>
          </dl>
          <dl>
            <dt><?php print t('Your email address<span>*</span>:'); ?> </dt>
            <dd>
             <?php print drupal_render($form['message']['email'])?>
            </dd>
          </dl>
          <dl>
            <dt><?php print t('The email address(es) <br />
              of your colleague(s)<span>*</span>:');?> </dt>
            <dd>&nbsp;</dd>
            <dd>
              <?php print drupal_render($form['femailone'])?>
            </dd>
            <dd>
            <?php print drupal_render($form['femailtwo'])?>
            </dd>
            <dd>
           <?php print drupal_render($form['femailthree'])?>
            </dd>
            <dd>
            <?php print drupal_render($form['femailfour'])?>
            </dd>
            <dd>
             <?php print drupal_render($form['femailfive'])?>
            </dd>
          </dl>
        </div>
        <h4><?php print t('Please note:');?> </h4>
        <p><?php print t('This site is not intended for children under the age of 13. We will not knowingly collect information from site visitors in this age group. We encourage parents to talk to their children about their use of the Internet and the information they disclose to websites.'); ?> </p>
        <p><?php print t('By submitting your information in this form you agree that it will be governed by our <a href="/privacy-policy" title="'.t('Privacy policy').'">Privacy Policy</a>.'); ?></p>
<?php 
 print drupal_render($form['submit']);
?>
<div  style='display:none;'><?php  print drupal_render($form); ?></div>
</div>