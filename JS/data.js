$(document).ready(function () {
	$('.multiple').css('display', 'none');
	$('#Operation-0').on('click', function(){
		$('#file-type').text('Single TEI-XML file (*.xml):');
		$('.multiple').css('display', 'none');
	});
	
	$('#Operation-1').on('click', function(){
		$('#file-type').text('Zipped TEI-XML files (*.zip):');
		$('.multiple').css('display', 'block');
	});
	
});

