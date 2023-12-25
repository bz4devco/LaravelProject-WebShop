$(document).on('click', '.number-spinner button', function () {    
	var btn = $(this),
		oldValue = btn.closest('.number-spinner').find('input').val().trim(),
		inputChar = btn.closest('.number-spinner').find('input').attr('data-char'),
		char = (inputChar != '') ? inputChar : '',
		oldValue = oldValue.replace(char,''),
		inputstep = Number(btn.closest('.number-spinner').find('input').attr('step')),
		inputmin = Number(btn.closest('.number-spinner').find('input').attr('min')),
		inputsmax = Number(btn.closest('.number-spinner').find('input').attr('max')),
		newVal = 0;
	if(inputsmax != ""){
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
	}else{
		if (btn.attr('data-dir') == 'up') {
			newVal = parseInt(oldValue) + inputstep;
		} else {
			if (oldValue > inputmin) {
				newVal = parseInt(oldValue) - inputstep;
			} else {
				newVal = inputmin;
			}
		}
	}

	btn.closest('.number-spinner').find('input').val(newVal + char);
});

$(document).on('blur', '.number-spinner .input-step-number', function () {
	var input = $(this),
		oldValue = input.val().trim(),
		char = ($(this).attr('data-char') != '') ? $(this).attr('data-char') : '';
		oldValue = oldValue.replace(char,''),
		inputmin = Number(input.attr('min')),
		inputsmax = Number(input.attr('max')),
		newVal = 0;

		if(inputsmax != ""){
			if(oldValue > inputsmax){
				newVal = inputsmax;
			}
			else if(oldValue < inputmin) {
				newVal = inputmin;
			}else {
				newVal = oldValue;
			}
		}else{
			if(oldValue < inputmin) {
				newVal = inputmin;
			}
			else {
				newVal = oldValue;
			}
		}

		input.val(newVal + char);
});


$('#form.num-input-check').submit(function (evt) {

	if($('.number-spinner .input-step-number').val() != undefined){
		oldValue = $('.number-spinner .input-step-number').val().trim();
		char = ($('.number-spinner .input-step-number').attr('data-char') != '') ? $('.number-spinner .input-step-number').attr('data-char') : '';
		oldValue = oldValue.replace(char,'');
		$('.number-spinner .input-step-number').val(oldValue);
		$('#form').submit(evt);
	}
});