<?php
// $Id: exit-disclaimer-message.tpl.php,v 1.1 2007/11/04 14:29:09 goba Exp $

/**
 * @file exit-disclaimer-message.tpl.php
 *
 * Available variables:
 * - $message: Exit Disclaimer Message
 */
$logo = theme_get_setting('logo'); 
$site_title = variable_get('site_name', '');


?>
<style>
div.exit {
	background-color:#ffffff;
	width:auto;
	.height: 30px;
}
.exit #page_container {
	width:539px;
	margin:0px auto;
	background:none;
}
.exit #header {
	background:url(<?php print base_path().path_to_theme()?>/images/bg_header.png) left top no-repeat;
	width:501px;
	height:84px;
	margin:0px;
	padding:41px 0px 0px 38px;
	.width:539px;
	.height:124px;
}
.exit #content {
	background:url(<?php print base_path().path_to_theme()?>/images/bg_exit.png) left top repeat-y;
	width:539px;
	padding:22px 0px 0px 0px;
	.padding:2px 0px 0px 0px;
	margin:0px;
}
.exit #content p {
	margin:0px auto;
	font-family:Georgia, "Times New Roman", Times, serif;
	font-size:14px;
	line-height:18px;
	color:#4d4e53;
	text-align:center;
	width:395px;
	padding-bottom:8px;
	.padding-left:20px;
	.margin-left:50px;
	.padding-bottom:0px;
}


.exit #content p a {
	margin-right:7px;
}
.exit #footer {
	background:url(<?php print base_path().path_to_theme()?>/images/bg_footer.png) left top no-repeat;
	width:539px;
	height:46px;
	margin:0px;
	padding:0px;
}

</style>
 
<div class="exit">
<div id="page_container">
  <div id="header"><img border="0" src="<?php print check_url($logo); ?>" alt="<?php print $site_title?>" /></div>
  <div id="content">
    <p><?php print $message; ?></p>
    <p><?php print $buttons; ?></p>
  </div>
  <div id="footer">&nbsp;</div>
</div>
</div>

