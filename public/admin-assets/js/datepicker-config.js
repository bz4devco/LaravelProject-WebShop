$(function() {
    $.mask.definitions['y']='[1]';
	$.mask.definitions['#']='[34]';
	$.mask.definitions['m']='[01]';
	$.mask.definitions['d']='[0123]';
	$.mask.definitions['h']='[012]';
	$.mask.definitions['i']='[012345]';
	
	$('#startdate').mask('y#99/m9/d9 h9:i9:i9');
	$('#enddate').mask('y#99/m9/d9 h9:i9:i9');


});