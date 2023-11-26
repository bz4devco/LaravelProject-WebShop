$(function(){
	
	
	window.from = $("#startdate").persianDatepicker({
			toolbox: {
                calendarSwitch: {
                    enabled: false
                }
            },
			initialValueType: 'persian',
            initialValue: false,
			observer: true,
			autoClose: true,
			calendarType: 'persian',
			timePicker: {
				enabled: true,
				hour: {
					enabled: true
				},
				minute: {
					enabled: true
				},
				second: {
					enabled: true
				}
			},
			format: 'YYYY/MM/DD HH:mm:ss',
			

//            minDate: new persianDate().subtract('day', 3).valueOf(),
            onSelect: function (unix) {
			from.touched = true;
			if(from.touched == true){
			document.getElementById("enddate").value=null;
			window.to = $("#enddate").persianDatepicker({
			toolbox: {
                calendarSwitch: {
                    enabled: false
                }
            },
            initialValue: false,
			observer: true,
			autoClose: true,
			calendarType: 'persian',
			timePicker: {
				enabled: true,
				hour: {
					enabled: true
				},
				minute: {
					enabled: true
				},
				second: {
					enabled: true
				}
			},
			format: 'YYYY/MM/DD HH:mm:ss',
//            minDate: new persianDate().subtract('day', 3).valueOf(),
            onSelect: function (unix) {
                to.touched = true;
                if (from && from.options && from.options.maxDate != unix) {
                    var cachedValue = from.getState().selected.unixDate;
//                    from.options = {maxDate: unix};
                    if (from.touched) {
//                        from.setDate(cachedValue);
                    }
                }
            }
        });
		}
                if (to && to.options && to.options.minDate != unix) {
                    var cachedValue = to.getState().selected.unixDate;
                    to.options = {minDate: unix};
                    if (to.touched) {
//                        to.setDate(cachedValue);
						
                    }
                }
            }
        });
	
	
	$("#enddate").persianDatepicker({
			toolbox: {
                calendarSwitch: {
                    enabled: false
                }
            },
				initialValueType: 'persian',
            initialValue: false,
			observer: true,
			autoClose: true,
			calendarType: 'persian',
			timePicker: {
				enabled: true,
				hour: {
					enabled: true
				},
				minute: {
					enabled: true
				},
				second: {
					enabled: true
				}
			},
			format: 'YYYY/MM/DD HH:mm:ss',
	});

});
