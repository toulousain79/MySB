// Select form change color
var select = document.getElementById('mySelect');
select.onchange = function () {
	select.className = this.options[this.selectedIndex].className;
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