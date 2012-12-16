function updateSelector(){
	telco = $("#TopupForm #Telco").val()
	$("#TopupForm #Amount").empty().load(telco + ".htm")
}

$(document).ready(function() {
	$("#TopupForm #Telco").on('change', updateSelector)
});
