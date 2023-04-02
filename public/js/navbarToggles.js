$(document).on("ready", function() {
    // When document loads, show description text
    $('#collapseDescription').collapse('show');
    $('#collapseRating').collapse('hide');
    $('#collapseReviews').collapse('hide');
    $('#toggleDescription').addClass('toggleActive');

    let clickable = true;
    function hideOther(collapse, toggle) {
        if (!clickable)
        {
            return;
        }

        clickable = false;

        $('#collapseDescription, #collapseRating, #collapseReviews')
            .not(collapse)
            .collapse('hide');

        $('#toggleDescription, #toggleRating, #toggleReviews')
            .not(toggle)
            .removeClass('toggleActive');

        setTimeout(function() {
            $(collapse).collapse('toggle');
            $(toggle).toggleClass('toggleActive');
        }, 500);

        setTimeout(function () {
            clickable = true;
        }, 1000);
    }

    // Description collapse
    $('#toggleDescription').on("click", function() {
        hideOther('#collapseDescription', '#toggleDescription');
    });

    // Rating collapse
    $('#toggleRating').on("click", function() {
        hideOther('#collapseRating', '#toggleRating');
    });

    // Reviews collapse
    $('#toggleReviews').on("click", function() {
        hideOther('#collapseReviews', '#toggleReviews');
    });
});
