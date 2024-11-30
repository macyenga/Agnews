// Initialize Gregorian datepicker
$(".has-datepicker").datepicker({
    format: "yyyy/mm/dd", // Date format (Year/Month/Day)
    changeMonth: true, // Allow changing the month
    changeYear: true, // Allow changing the year
    yearRange: '-70:-1', // Allow selecting years from 70 years ago to the current year
    onSelect: function(dateText) {
        console.log(dateText); // Log the selected date
    }
});

// Initialize Gregorian datepicker with default date
$(".has-datepicker-now").each(function() {
    $(this).datepicker({
        setDate: $(this).val(), // Set the date to the value of the input
        format: "yyyy/mm/dd" // Date format (Year/Month/Day)
    });
});

// Initialize "from" and "to" date range pickers
var to, from;
to = $(".datepicker-to").datepicker({
    format: "yyyy/mm/dd", // Date format (Year/Month/Day)
    autoClose: true, // Close the picker after selecting a date
    onSelect: function(dateText) {
        to.touched = true; // Mark the "to" date as touched
        if (from && from.options && from.options.maxDate != dateText) {
            var cachedValue = from.getState().selected.dateText;
            from.options = {maxDate: dateText}; // Set max date for "from" picker
            if (from.touched) {
                from.setDate(cachedValue); // Reset the "from" date if touched
            }
        }
    }
});
from = $(".datepicker-from").datepicker({
    format: "yyyy/mm/dd", // Date format (Year/Month/Day)
    autoClose: true, // Close the picker after selecting a date
    onSelect: function(dateText) {
        from.touched = true; // Mark the "from" date as touched
        if (to && to.options && to.options.minDate != dateText) {
            var cachedValue = to.getState().selected.dateText;
            to.options = {minDate: dateText}; // Set min date for "to" picker
            if (to.touched) {
                to.setDate(cachedValue); // Reset the "to" date if touched
            }
        }
    }
});
