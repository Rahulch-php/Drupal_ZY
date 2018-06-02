if (Drupal.jsEnabled) {
	$(document).ready(function() {
		if($("#zytiga-landing-page-settings-form").length > 0) {
			$('#countries-list input[type="checkbox"]').change(function() {
				$('#countries-list input[type="text"][name="'+$(this).attr("name")+'_url"]').attr('disabled', !($(this).is(':checked')));
				$('#countries-list input[type="text"][name="'+$(this).attr("name")+'_released_by"]').attr('disabled', ($(this).is(':checked')));
			});
			$('#countries-list input[type="checkbox"]').each(function() {
				$('#countries-list input[type="text"][name="'+$(this).attr("name")+'_url"]').attr('disabled', !($(this).is(':checked')));
				$('#countries-list input[type="text"][name="'+$(this).attr("name")+'_released_by"]').attr('disabled', $(this).is(':checked'));
			});
		}
	});
}