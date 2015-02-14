$(function() {
	// hide all the sub-menus
	$("span.toggle").next().hide();
	
	// add a link nudging animation effect to each link
    $("#jQ-menu a, #jQ-menu span.toggle").hover(function() {
        $(this).stop().animate( {
			fontSize:"17px",
			paddingLeft:"10px",
			color:"black"
        }, 300);
    }, function() {
        $(this).stop().animate( {
			fontSize:"14px",
			paddingLeft:"0",
			color:"#808080"
        }, 300);
    });
	
	// set the cursor of the toggling span elements
	$("span.toggle").css("cursor", "pointer");
	
	// prepend a plus sign to signify that the sub-menus aren't expanded
	$("span.toggle").prepend("+ ");
	
	// add a click function that toggles the sub-menu when the corresponding
	// span element is clicked
	$("span.toggle").click(function() {
		$(this).next().toggle(1000);
		
		// switch the plus to a minus sign or vice-versa
		var v = $(this).html().substring( 0, 1 );
		if ( v == "+" )
			$(this).html( "-" + $(this).html().substring( 1 ) );
		else if ( v == "-" )
			$(this).html( "+" + $(this).html().substring( 1 ) );
	});
});