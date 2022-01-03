$(document).ready(function() {
  //tooltip;
  $('.tip').tooltip();
  //datepicker
  $("#inputDate").datepicker();

  //taginput
  $('#source-tags').tagsinput();

  //String to Slug
  $(document).ready( function() {
	$("#inputTitle").stringToSlug({
		setEvents: 'keyup keydown blur',
		getPut: '#inputSlug',
		space: '-'
	});
});

});