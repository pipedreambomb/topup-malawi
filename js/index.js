function refreshSelector(){
	var telco = $("#TopupForm #Telco").val()
	var amountSlc = $("#TopupForm #Amount").empty()
	$.getJSON("ajax/getDenominations.php?telco=" + telco, function(data) {
		$.each(data, function(key, val) {
			amountSlc.append("<option>" + val.amount + "</option>")	
		})			
	})
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
