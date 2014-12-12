// Select form change color
var select = document.getElementById('mySelect');
select.onchange = function () {
	select.className = this.options[this.selectedIndex].className;
}

// Apply Config
function ApplyConfig()
{
	document.getElementById("ApplyConfigButton").style.backgroundColor = '#ffff99';
}