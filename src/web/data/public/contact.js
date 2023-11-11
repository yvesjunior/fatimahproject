$( "#becomevoluntierform0" ).submit(function( event ) {

	event.preventDefault();
	var $form = $(this),
		url = $form.attr( "action" ),
		values = $(this).serialize();

	var posting = $.post( url, 
			values
		);

	posting.done(function( data ) {
		$( "#becomevoluntierform0" ).trigger('reset');
		alert(data)
	});

});

$( "#contactform0" ).submit(function( event ) {

	event.preventDefault();
	var $form = $(this),
		url = $form.attr( "action" ),
		values = $(this).serialize();

	var posting = $.post( url, 
			values
		);

	posting.done(function( data ) {
		$( "#contactform0" ).trigger('reset');
		alert(data)
	});

});