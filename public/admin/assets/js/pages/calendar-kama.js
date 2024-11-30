// Initialize Kama datepicker
var datePickerOptions = {
    placeholder: "Day / Month / Year", // Placeholder text
    twodigit: true, // Allow two-digit years
    closeAfterSelect: true, // Close the picker after selecting a date
    nextButtonIcon: "fa fa-arrow-right", // Icon for the next button
    previousButtonIcon: "fa fa-arrow-left", // Icon for the previous button
    buttonsColor: "gray", // Color of the buttons
    markToday: true, // Highlight today's date
    markHolidays: true, // Mark holidays on the calendar
    highlightSelectedDay: true, // Highlight the selected day
    sync: true // Sync the datepicker with other elements (if needed)
};
kamaDatepicker("kama-datepicker", datePickerOptions);


var datePickerOptionsEmpty = {
    placeholder: "Day / Month / Year", // Placeholder text
    twodigit: true, // Allow two-digit years
    closeAfterSelect: true, // Close the picker after selecting a date
    nextButtonIcon: "fa fa-arrow-right", // Icon for the next button
    previousButtonIcon: "fa fa-arrow-left", // Icon for the previous button
    buttonsColor: "gray", // Color of the buttons
    markToday: false, // Do not highlight today's date
    markHolidays: true, // Mark holidays on the calendar
    highlightSelectedDay: true, // Highlight the selected day
    sync: true // Sync the datepicker with other elements (if needed)
};
kamaDatepicker("kama-datepicker-empty", datePickerOptionsEmpty);
