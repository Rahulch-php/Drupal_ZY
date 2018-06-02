<?php
// $Id: resourcesbox.tpl.php,v 1.3 2007/08/07 08:39:36 goba Exp $

if(substr_count($type,'Video')> 0){
	$bgimageres="icon_video.gif";
} else if(substr_count($type,'Documents')> 0){
	$bgimageres="icon_document.gif";
} 
else {
	$bgimageres="icon_interactive.gif";
}
 ?>
<div class="result">
 
<ul>
<li class="col1"><img src="<?php print drupal_get_path('theme', 'zytiga_uk')?>/images/<?php print $bgimageres;?>"  alt="<?php print $bgimageres;?>" title="<?php print $bgimageres; ?>" /></li>
<li class="col2"> 

<?php if(substr_count($type,'Video')> 0){ ?>

<?php
//$link="http://zytiga.uk/abiraterone";
//$link="http://zytiga.uk/node/29?keepThis=true&amp;TB_iframe=true&amp;height=250&amp;width=431";
$nid = explode("/", $link);
$passvideo = $nid[3];
	if($nid['3'] =='node'){
			$blocknid = explode("?", $nid[4]);
			$newstring = $blocknid[0];
		?>
		<h3><?php print $title; ?></h3>
		<hr />
		<p><?php print strip_tags($snippet); ?>
		<a class="thickbox" href="display_video/<?php echo $newstring; ?>?height=280&width=440" ><?php print t('More...'); ?></a></p>
		
		<?php 	
	}else {
		$string = drupal_lookup_path('source', $path = $passvideo, $path_language = '');
		$newstring = str_replace("node/", "", $string);
		?>
		<a href="<?php print $link;?>" class="newheaders" > <h3><?php print $title; ?></h3></a>
		<hr />
		<p><?php print strip_tags($snippet); ?>
		<a class="thickbox" href="display_video/<?php echo $newstring; ?>?height=280&width=440" ><?php print t('More...'); ?></a></p>
		
	<?php 
	}
	?>

<?php } else{ ?>
<h3><?php print $title; ?></h3>
<hr />
<p><?php print strip_tags($snippet); ?>
<a href="<?php print $link;?>" ><?php print t('More...'); ?></a></p>
<?php } ?>

</li>
 </ul>
 
</div>
