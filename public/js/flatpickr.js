flatpickr(".dateInputFlatpickr", {
    enableTime: false,
    disableMobile: "true",
    dateFormat: "d.m.Y 00:00.00",
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

$('.dateInputFlatpickrClose').on("click", function() {
    // Upon closing the modal flatpickr is reseted

    // Delay function so input change is not visible
    // It takes modal some time to close itself
    setTimeout(function() {
        $(".dateInputFlatpickr")[0]._flatpickr.clear();
    }, 200);
});

