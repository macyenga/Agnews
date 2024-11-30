$('.has-datepicker').datepicker({
    defaultDate: new Date(1986, 0, 1), // Default date (January 1, 1986)
    changeMonth: true, // Allow changing the month
    changeYear: true, // Allow changing the year
    dateFormat: 'yy/mm/dd', // Date format (year/month/day)
    yearRange: '-70:-1' // Allow selecting years from 70 years ago to the current year
});

$(".has-datepicker-now").each(function() {    
    $(this).datepicker({
        'setDate': $(this).val(), // Set the date to the value of the input
        dateFormat: 'yy/mm/dd' // Date format (year/month/day)
    });
});
