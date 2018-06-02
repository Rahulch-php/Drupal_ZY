<?php //echo "<pre>"; print_r($node); ?>
<?php 
       $video_name = $node->field_video_name[0]['value'];
       $swfFile = $node->field_video_url[0]['value']; 
       ?>
	<!-- START OF THE PLAYER EMBEDDING TO COPY-PASTE -->
	<div id="mediaplayer"></div>
	
	<script type="text/javascript" src="/<?php print path_to_theme() . '/js/'?>jwplayer.js"></script>
	<script type="text/javascript">
		jwplayer("mediaplayer").setup({
			flashplayer: "/<?php print file_directory_path() . '/videos/'; ?>player.swf",
			file: "<?php print $swfFile; ?>",
			height: "260",
			width: "459",
			events: {
			onComplete: function() {
				 _gaq.push(['_trackEvent', 'Videos', 'Completed', 'ModeOfActionVideo']);
				 _gaq.push(['_trackEvent', 'Videos', 'Completed', 'ConsiderationsInAdvancedPC']);
			}
			onPlay: function() {
					_gaq.push(['_trackEvent', 'Videos', 'Started', 'ModeOfActionVideo']);
					_gaq.push(['_trackEvent', 'Videos', 'Started', 'ConsiderationsInAdvancedPC']);
			}
			}
		});
	</script>
	<!-- END OF THE PLAYER EMBEDDING -->