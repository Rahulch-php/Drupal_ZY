<?php
$node = node_load($video_url);
$swfFile = $node->field_akamai_url[0]['value']; 

if(empty($swfFile)){
$swfFile = $node->field_video_url[0]['value']; 	
}
?>
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
	