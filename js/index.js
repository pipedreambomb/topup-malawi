function refreshSelector(){
	telco = $("#TopupForm #Telco").val()
	$("#TopupForm #Amount").empty().load(telco + ".htm")
}

function setPopover() {
	var options = {
		placement: 'top',
		title: 'How does it work?',
		content:   'Simple. We\'ll send you the code(s) you need just like you\'d get from a scratchcard, so you can enter it from your phone and get calling again in no time!',
		trigger:   'hover'
	}
	$('.popoverme').popover(options)
}

// Just a display thing, so it shows up blue at top of screen
function setHomeButtonActive() {
	$("#HomeButton").addClass("active")
}

$(document).ready(function() {
	setHomeButtonActive()
	$("#TopupForm #Telco").on('change', refreshSelector)
	setPopover()
});
