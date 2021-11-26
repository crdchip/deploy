$(document).ready(function(){
	$("#textsearch").on('keyup', function(event)
	{
		var tukhoa = $(this).val().toLowerCase();

		$('textTable tr').filter(function()
		{
			$(this).toggle($(this).text().toLowerCase().indexOf(tukhoa)>-1);
		});
	});
});