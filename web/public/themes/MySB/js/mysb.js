// Do Apply Config
function DoApplyConfig() {
	$.ajax({
		type: "POST",
		url: '/?apply-configuration.html',
		data: {},
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

// NetData badges
var NETDATA_BADGES_AUTOREFRESH_SECONDS = 5;
function refreshNetdataBadges() {
	var now = new Date().getTime().toString();
	$('.netdata-badge').each(function () {
		this.src = this.src.replace(/\&_=\d*/, '') + '&_=' + now;
	});
	setTimeout(refreshNetdataBadges, NETDATA_BADGES_AUTOREFRESH_SECONDS * 1000);
}
setTimeout(refreshNetdataBadges, NETDATA_BADGES_AUTOREFRESH_SECONDS * 1000);
