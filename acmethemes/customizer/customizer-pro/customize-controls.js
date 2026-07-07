( function( api ) {

	// Extends our custom "feminine-style" section.
	api.sectionConstructor['feminine-style'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );