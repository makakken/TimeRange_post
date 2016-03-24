jQuery(function() {
  if ( jQuery('[type="date"]').prop('type') != "date" ) { 
      jQuery('[type="date"]').datepicker({
        prevText: '<span class="dashicons dashicons-arrow-left"></span>', prevStatus: '',
        prevJumpText: '&#x3c;&#x3c;', prevJumpStatus: '',
        nextText: '<span class="dashicons dashicons-arrow-right"></span>', nextStatus: '',
        nextJumpText: '&#x3e;&#x3e;', nextJumpStatus: '',
        currentText: 'heute', currentStatus: '',
        todayText: 'heute', todayStatus: '',
        clearText: '-', clearStatus: '',
        closeText: 'schließen', closeStatus: '',
        monthNames: ['Januar','Februar','März','April','Mai','Juni',
        'Juli','August','September','Oktober','November','Dezember'],
        monthNamesShort: ['Jan','Feb','Mär','Apr','Mai','Jun',
        'Jul','Aug','Sep','Okt','Nov','Dez'],
        dayNames: ['Sonntag','Montag','Dienstag','Mittwoch','Donnerstag','Freitag','Samstag'],
        dayNamesShort: ['So','Mo','Di','Mi','Do','Fr','Sa'],
        dayNamesMin: ['So','Mo','Di','Mi','Do','Fr','Sa'],
        buttonText: "<span class='dashicons dashicons-calendar-alt'></span>",
      showMonthAfterYear: false,
      showOn: 'both',
      dateFormat:'d.mm.yyyy'
    });
	jQuery('#ui-datepicker-div').addClass('TimeRange-Post');
  }
});