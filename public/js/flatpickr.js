flatpickr(".dateInputFlatpickr", {
    enableTime: true,
    time_24hr: true,
    minuteIncrement: 5,
    disableMobile: "true",  // Needed in order to be shown correctly on small screens/mobile devices
    dateFormat: "d.m.Y H:i:00",
    weekdays: ["Pon", "Uto", "Str", "Stv", "Pia", "Sob", "Ned"],
    locale: {
        months: {
            shorthand: ["Jan", "Feb", "Mar", "Apr", "Máj", "Jún", "Júl", "Aug", "Sep", "Okt", "Nov", "Dec"],
            longhand: ["Január", "Február", "Marec", "Apríl", "Máj", "Jún", "Júl", "August", "September", "Október", "November", "December"]
        },
        weekdays: {
            shorthand: ["Ned", "Pon", "Uto", "Str", "Stv", "Pia", "Sob"],
            longhand: ["Nedela", "Pondelok", "Utorok", "Streda", "Stvrtok", "Piatok", "Sobota"],
        },
        firstDayOfWeek: 1 // Set Monday as the first day of the week
    }
});

$('#setPaymentDateModal').on('hidden.bs.modal', function() {
    // Upon closing the modal flatpickr is reseted
    $(".dateInputFlatpickr")[0]._flatpickr.clear();
});
