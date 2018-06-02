<?php

function find_country(){
	$user_ip = ip_address();
	//$user_ip = '218.248.73.47'; //IN
	//$user_ip = '203.124.192.0'; //AU
	//$user_ip = '148.177.0.100'; // US
	//print ip_address();die();

	$google_url = 'http://maps.google.com/jsapi?key=ABQIAAAANBpPf61ydYuxflqw5wXkvRSugtQJCqa4pD8rerzbPSCAefgsNxTo3MNM0mvwPn0bF9cJFdVJcON16w&callback=loadMaps&q='.$user_ip;
	$arin_url = "http://ws.arin.net/whois/?queryinput=$user_ip";
	if(process_ip($arin_url, 2) == "US"){
		return 1;
	}
	else{
		return 0;
	}
	return 0;
}

?>

<script language="javascript">

$().ready(function() {
    var statusCode = "<?php print find_country(); ?>";
    if(statusCode == 0){
        $("#addb_signup").hide();
        $("#block-webformblock-12").hide();
    }
});
</script>



