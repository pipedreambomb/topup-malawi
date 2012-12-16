$(document).ready(function() {
	//When checkbox is clicked on..
	$("#AcceptChk").on('change', function() {
		//.. toggle the Submit button being disabled/enabled
		$('#Submit').attr('disabled', !$(this).attr('checked'))
	})
})
