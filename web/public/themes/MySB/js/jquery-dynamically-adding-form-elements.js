jQuery( function ( $ ) {
	$( '#btnAdd' ).click( function() {
		var num = $( '.clonedInput' ).length;		// how many "duplicatable" input fields we currently have
		var newNum	= new Number( num + 1 );		// the numeric ID of the new input field being added
		var newElem = $( '#input' + num ).clone().attr( 'id', 'input' + newNum ).fadeIn('slow');

		// Add trackers (TrackersAdd.php & OptionsMySB.php & entingInfo.php)
		newElem.find('.input_id').attr('id', 'input_id'+ newNum).attr('name', 'input_id[' + newNum + ']').val(newNum);
		// Add trackers (TrackersAdd.php)
        newElem.find('.input_tracker').attr('id', 'input_tracker' + newNum).attr('name', 'input_tracker[' + newNum + ']').val('');
		// Add directory (OptionsMySB.php)
		newElem.find('.input_directory').attr('id', 'input_directory' + newNum).attr('name', 'input_directory[' + newNum + ']').val('');
		newElem.find('.input_sync_mode').attr('id', 'input_sync_mode' + newNum).attr('name', 'input_sync_mode[' + newNum + ']').val('');
		// Add address (TrackersAdd.php)
		newElem.find('.input_address').attr('id', 'address' + newNum).attr('name', 'address[' + newNum + ']').val('');
		// Add select (TrackersAdd.php)
		newElem.find('.select_is_active').attr('id', 'is_active' + newNum).attr('name', 'is_active[' + newNum + ']').val('0');
		// Add amount (RentingInfo.php)
		newElem.find('.input_amount').attr('id', 'input_amount' + newNum).attr('name', 'input_amount[' + newNum + ']').val('');
		newElem.find('.select_user').attr('id', 'select_user' + newNum).attr('name', 'select_user[' + newNum + ']').val('0');
		newElem.find('.input_date').attr('id', 'input_date' + newNum).attr('name', 'input_date[' + newNum + ']').val('');

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