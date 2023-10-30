/* global wp, jQuery */
( function( $ ) {
	/**
	 * Quantity "plus" and "minus" buttons
	 */
	$(document.body ).on( 'click', '.plus, .minus', function(e) {
		console.log(e.target);
		e.preventDefault();
		var $qty        = $( this ).closest( '.quantity' ).find( '.qty'),
			currentVal  = parseFloat( $qty.val() ),
			max         = parseFloat( $qty.attr( 'max' ) ),
			min         = parseFloat( $qty.attr( 'min' ) ),
			step        = $qty.attr( 'step' );

		// Format values
		if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
		if ( max === '' || max === 'NaN' ) max = '';
		if ( min === '' || min === 'NaN' ) min = 0;
		if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

		// Change the value
		if ( $( this ).is( '.plus' ) ) {
			if ( max && ( currentVal >= max ) ) {
				$qty.val( max );

			} else {
				$qty.val( ( currentVal + parseFloat( step )).toFixed( step.getDecimals() ) );

			}
		} else {
			if ( min && ( currentVal <= min ) ) {
				$qty.val( min );

			} else if ( currentVal > 0 ) {
				$qty.val( ( currentVal - parseFloat( step )).toFixed( step.getDecimals() ) );

			}
		}

		// Trigger change event
		$qty.trigger( 'change' );

	});
}( jQuery ) );

