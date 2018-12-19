$(function() {
    $('.rangeCalendar').daterangepicker({
      timePicker: true,
      startDate: moment().startOf('hour'),
      endDate: moment().startOf('hour').add(32, 'hour'),
      showCustomRangeLabel: (true),
      locale: {
        "format": "MM/DD/YYYY",
        "separator": " - ",
        "applyLabel": "Aplicar",
        "cancelLabel": "Cancelar",
        "fromLabel": "Desde",
        "toLabel": "Hasta",
        "customRangeLabel": "Custom",
        "daysOfWeek": [
            "Do",
            "Lu",
            "Ma",
            "Mi",
            "Ju",
            "Vi",
            "Sa"
        ],
        "monthNames": [
            "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agusto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre"
        ],
        "firstDay": 1
      }
    });


	
    $('.multiCalendar').datepicker({
        maxViewMode: 3,
        language: "es",
        multidate: true,
        multidateSeparator: "-",
        toggleActive: true,
        defaultViewDate: { year: 2018, month: 12, day: 20 },
        todayHighlight: true,

    });
  });