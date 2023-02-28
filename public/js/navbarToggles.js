$(document).ready(function() {
    // When document loads, show description text
    $('#collapseDescription').collapse('hide');
    $('#collapseRating').collapse('hide');
    $('#collapseReviews').collapse('show');
    $('#toggleReviews').addClass('toggleActive');

    var clickable = true;
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
    $('#toggleDescription').click(function() {
        hideOther('#collapseDescription', '#toggleDescription');
    });

    // Rating collapse
    $('#toggleRating').click(function() {
        hideOther('#collapseRating', '#toggleRating');
    });

    // Reviews collapse
    $('#toggleReviews').click(function() {
        hideOther('#collapseReviews', '#toggleReviews');
    });
});
