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
		alert("success");
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
		alert("success");
	});

});

// $(function() {
//     console.log( "ready!" );
// 	// $( ".gallery-img" ).append("<div class='col-xl-4 col-md-6 item homeless foodHealth'><div class='portfolio-item'><img src='assets/img/portfolio/portfolio2.jpg' alt='Portfolio'><div class='portfolio-item__over'></div></div></div>" );

// });
