// Select change SMTP values
function SMTP_ChangeValues(JSON_File, Email, Username, Password) {
		$(function() {
				$("#json-provider").change(function() {

					var $dropdown = $(this);

					$.getJSON(JSON_File, function(data) {

						var key = $dropdown.val();
						var host = [];
						document.getElementById("SmtpUsername").value = Username;
						document.getElementById("SmtpPasswd").value = Password;
						document.getElementById("SmtpPasswdConfirm").value = Password;
						document.getElementById("SmtpEmail").value = Email;
						port = '465';

						switch(key) {
							case 'LOCAL':
								host = data.LOCAL;
								port = '25';
								document.getElementById("SmtpUsername").value = "LOCAL";
								document.getElementById("SmtpPasswd").value = "LOCAL";
								document.getElementById("SmtpPasswdConfirm").value = "LOCAL";
								break;
							case 'FREE':
								host = data.FREE;
								break;
							case 'YAHOO':
								host = data.YAHOO;
								break;
							case 'OVH':
								host = data.OVH;
								break;
							case 'GMAIL':
								host = data.GMAIL;
								break;
							case 'ZOHO':
								host = data.ZOHO;
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
function ApplyConfig(state) {
	switch (state) {
		case 'ToUpdate':
			document.getElementById("ApplyConfigButtonState").className = "ApplyConfigButtonDO";
			break;
		case 'Updated':
			document.getElementById("ApplyConfigButtonState").className = "ApplyConfigButtonNothing";
			break;
	}
}
