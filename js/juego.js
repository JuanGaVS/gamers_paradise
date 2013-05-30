// JavaScript Document
$(document).ready(function() {
		$(".fancybox").fancybox();
		
		$('#iframe').fancybox({
			'width'         : '100%',
    'height'        : '100%',
    'autoScale'     : true,
    'transitionIn'  : 'none',
    'transitionOut' : 'none',
    'type'          : 'iframe'
		});
	});
