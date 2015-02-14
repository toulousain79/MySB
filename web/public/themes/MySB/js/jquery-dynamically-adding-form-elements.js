jQuery( function ( $ ) {
	$( '#btnAdd' ).click( function() {
		var num = $( '.clonedInput' ).length;		// how many "duplicatable" input fields we currently have
		var newNum	= new Number( num + 1 );		// the numeric ID of the new input field being added
		var newElem = $( '#input' + num ).clone().attr( 'id', 'input' + newNum ).fadeIn('slow');		
		
		newElem.find('.input_id').attr('id', 'input_id'+ newNum).attr('name', 'input_id[' + newNum + ']').val(newNum);
		
		// Add trackers
        newElem.find('.input_tracker_domain').attr('id', 'tracker_domain' + newNum).attr('name', 'tracker_domain[' + newNum + ']').val('');
		
		// Add address
		newElem.find('.input_address').attr('id', 'address' + newNum).attr('name', 'address[' + newNum + ']').val('');
		
		newElem.find('.select_is_active').attr('id', 'is_active' + newNum).attr('name', 'is_active[' + newNum + ']').val('0');
		
		
		$( '#input' + num ).after( newElem );
		$( '#btnDel' ).attr( 'disabled', false );
		if ( newNum == 5 )
			$( '#btnAdd' ).attr( 'disabled', 'disabled' );
	});
	
	$( '#btnDel' ).click( function() {
		var num = $( '.clonedInput' ).length;		// how many "duplicatable" input fields we currently have
		$( '#input' + num ).remove();				// remove the last element
		$( '#btnAdd' ).attr( 'disabled', false );	// enable the "add" button
		
		// if only one element remains, disable the "remove" button
		if ( num-1 == 1 )
			$( '#btnDel' ).attr( 'disabled', 'disabled' );
	});
			
	$( '#btnDel' ).attr( 'disabled', 'disabled' );
});