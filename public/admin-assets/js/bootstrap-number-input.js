$(document).on('click', '.number-spinner button', function () {    
	var btn = $(this),
		oldValue = btn.closest('.number-spinner').find('input').val().trim(),
		oldValue = oldValue.replace('%',''),
		inputstep = Number(btn.closest('.number-spinner').find('input').attr('step')),
		inputmin = Number(btn.closest('.number-spinner').find('input').attr('min')),
		inputsmax = Number(btn.closest('.number-spinner').find('input').attr('max')),
		newVal = 0;

	
	if (btn.attr('data-dir') == 'up') {
		if(oldValue < inputsmax){
		newVal = parseInt(oldValue) + inputstep;
		}
		else {
			newVal = inputsmax;
		}
	} else {
		if (oldValue > inputmin) {
			newVal = parseInt(oldValue) - inputstep;
		} else {
			newVal = inputmin;
		}
	}
	btn.closest('.number-spinner').find('input').val(newVal+'%');
});

$(document).on('blur', '.number-spinner #after', function () {
	var input = $(this),
		oldValue = input.val().trim(),
		oldValue = oldValue.replace('%',''),
		inputmin = Number(input.attr('min')),
		inputsmax = Number(input.attr('max')),
		newVal = 0;

		console.log(oldValue,inputmin,inputsmax);

		if(oldValue > inputsmax){
			newVal = inputsmax;
		}
		else if(oldValue < inputmin) {
			newVal = inputmin;
		}else {
			newVal = oldValue;
		}

		input.val(newVal+'%');
});