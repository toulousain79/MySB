// Select form change color
var select = document.getElementById('mySelect');
select.onchange = function () {
	select.className = this.options[this.selectedIndex].className;
}

// Apply Config
function ApplyConfig(state)
{
	switch (state) {
		case 'ToUpdate':
			document.getElementById("ApplyConfigButton").className = "ApplyConfigButtonDO";
			break;
		case 'Updated':
			document.getElementById("ApplyConfigButton").className = "ApplyConfigButtonNothing";
			break;
		case 'Do':
			$.ajax({
				  type: "POST",
				  dataType: "json",
				  url: "ApplyConfig.php", //Relative or absolute path to response.php file

				});			
			break;			
	}
	
}