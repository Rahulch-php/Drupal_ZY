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
			width: "446",
			image: "<?php print '/' . $node->field_video_thumbnail[0]['filepath']; ?>"
		});
	</script>
      </div>
    </div>
  </div>