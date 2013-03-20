/*------------------------------------------------------------------------------
# Copyright 2013 George Nixon
# 
# Licensed under the Apache License, Version 2.0 (the "License");
# you may not use this file except in compliance with the License.
# You may obtain a copy of the License at
# 
#   http://www.apache.org/licenses/LICENSE-2.0
# 
# Unless required by applicable law or agreed to in writing, software
# distributed under the License is distributed on an "AS IS" BASIS,
# WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
# See the License for the specific language governing permissions and
# limitations under the License.
-----------------------------------------------------------------------------*/
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
