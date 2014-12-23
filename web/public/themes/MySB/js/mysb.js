// Select form change color
var select = document.getElementById('mySelect');
select.onchange = function () {
	select.className = this.options[this.selectedIndex].className;
}

// Select change SMTP values
function SMTP_ChangeValues(JSON_File) {
		$(function() {		
				$("#json-provider").change(function() {
	
					var $dropdown = $(this);
				
					$.getJSON(JSON_File, function(data) {
					
						var key = $dropdown.val();
						var host = [];
											
						switch(key) {
							case 'LOCAL':
								host = data.LOCAL;
								port = '25';
								break;
							case 'FREE':
								host = data.FREE;
								port = '465';
								break;
							case 'YAHOO':
								host = data.YAHOO;
								port = '465';
								break;
							case 'OVH':
								host = data.OVH;
								port = '465';
								break;
							case 'GMAIL':
								host = data.GMAIL;
								port = '465';
								break;							
						}
						
						var $jsontwo = $("#json-host");
						$jsontwo.empty();
						$jsontwo.append("<option value=\"" + host + "\">" + host + "</option>");

						var $jsontwo = $("#json-port");
						$jsontwo.empty();
						$jsontwo.append("<option value=\"" + port + "\">" + port + "</option>");							
					});
				});

		});
}

// Do Apply Config
function DoApplyConfig() {
      $.ajax({
           type: "POST",
           url: '/?apply-configuration.html',
           data:{},

      });
}

// Apply Config
function ApplyConfig(state)
{
	switch (state) {
		case 'ToUpdate':
			document.getElementById("ApplyConfigButtonState").className = "ApplyConfigButtonDO";
			break;
		case 'Updated':
			document.getElementById("ApplyConfigButtonState").className = "ApplyConfigButtonNothing";
			break;			
	}
	
}