$(document).on("click", "#openSearchNavbar", function() {
    let searchElement = $('#searchNavbar');
    searchElement.slideToggle("fast", function() {
        // When the element is closed, delete input content
        if (!searchElement.is(":visible"))
        {
            $('#searchInput').val('');
        }
    });
});
