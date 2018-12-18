$(function() {
    $('input[name="dateRange"]').daterangepicker({
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


    $('input[name="multipleDates"]').datepicker({
        multidate: true,
          format: 'dd-mm-yyyy'
      });
  });