function refreshSelector(){
	var telco = $("#TopupForm #Telco").val()
	var amountSlc = $("#TopupForm #Amount").empty()
	$.getJSON("ajax/getDenominations.php?telco=" + telco, function(data) {
		for(var i = 1; i <= 5; i++) {
			amountSlc.append("<option>" + i * i * data[0].amount + "</option>")	
		}
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
