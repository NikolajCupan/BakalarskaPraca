$(document).on("click", "#openSearchNavbar", function() {
    let searchElement = $('#searchNavbar');

    // If the animation is already in progress, do not allow user to trigger it again
    if (!searchElement.is(":animated"))
    {
        searchElement.slideToggle("fast", function() {
            // When the element is being closed, delete input content
            if (!searchElement.is(":visible"))
            {
                $('#searchInput').val('');
            }
        });
    }
});
