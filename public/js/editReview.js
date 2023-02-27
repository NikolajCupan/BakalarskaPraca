$('.editReviewClass').click(function() {
    let productId = $(this).data('product-id');
    let authorId = $(this).data('author-id');
    let rating = $(this).data('rating');

    // There are two possible states of edit button
    //      1. inactive => <p> is changed to <textarea>
    //      2. active   => <textarea> is changed to <p>, data is sent using AJAX to BE
    if ($(this).hasClass('editReviewClassActive'))
    {
        // 2. state
        let textArea = $('#activeProduct' + productId + 'author' + authorId);
        let editButton = $(this);
        let starsSelector = $('#selectProduct' + productId + 'author' + authorId);
        let newRating = starsSelector.find(":selected").val();

        $.ajax({
            url: "/user/editReview",
            method: 'POST',
            data: {
                productId: productId,
                authorId: authorId,
                text: textArea.val(),
                rating: newRating
            },
            // This header must be added otherwise AJAX fails
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (!response.success)
                {
                    alert(response.message);
                    // Do not continue if validation fails
                    return;
                }

                // Prepare <p> element
                let paragraph = $('<p>', {
                    id: 'product' + productId + 'author' + authorId,
                    class: 'wrapText m-b-5 m-t-10'
                }).text(textArea.val());

                // Replace <textarea> with <p>
                textArea.replaceWith(paragraph);

                // Modify the edit button
                // Class is removed to indicate that review is not being changed anymore
                editButton.css('color', 'inherit');
                editButton.removeClass('editReviewClassActive');
                editButton.data('rating', newRating);

                // Remove star selector
                starsSelector.remove();

                // Replace old stars with new stars
                // Filled stars
                for (let i = 0; i < newRating; i++)
                {
                    let star = $('#star' + i + 'product' + productId + 'author' + authorId);
                    star.removeClass('bi-star');
                    star.addClass('bi-star-full');

                    let path = star.find('path');
                    path.attr('d', 'M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z');
                }

                // Empty stars
                for (let i = 4; i >= newRating; i--)
                {
                    let star = $('#star' + i + 'product' + productId + 'author' + authorId);
                    star.removeClass('bi-star-full');
                    star.addClass('bi-star');

                    let path = star.find('path');
                    path.attr('d', 'M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z');
                }
            },
            error: function(response) {
                // If AJAX calls do not do anything
                alert(response.responseJSON.message);
            }
        });
    }
    else
    {
        // 1. state
        let review = $('#product' + productId + 'author' + authorId);

        // Prepare <textarea> element
        let textarea = $('<textarea>', {
            id: 'activeProduct' + productId + 'author' + authorId,
            class: 'form-control m-b-5 m-t-10',
            width: review.innerWidth(),
            height: review.innerHeight() + 20,
            css: { 'min-height': '55px' }
        }).val(review[0].innerText);

        // Modify the edit button
        // Class is added to indicate the review is being changed
        $(this).css('color', 'red');
        $(this).addClass('editReviewClassActive');

        // Replace <p> with <textarea>
        review.replaceWith(textarea);

        // Star selector is placed below the textarea
        let starsSelect = getSelectElement(productId, authorId, rating);
        $(starsSelect).insertAfter(textarea);
    }
});

function getSelectElement(productId, authorId, rating)
{
    return selectElement = $('<select>', {
        'class': 'mt-1 form-select form-control-color',
        'style': 'width: 125px',
        'aria-label': 'Default select example',
        html: '<option value="0">&star;&star;&star;&star;&star;</option>' +
            '<option value="1">&starf;&star;&star;&star;&star;</option>' +
            '<option value="2">&starf;&starf;&star;&star;&star;</option>' +
            '<option value="3">&starf;&starf;&starf;&star;&star;</option>' +
            '<option value="4">&starf;&starf;&starf;&starf;&star;</option>' +
            '<option value="5">&starf;&starf;&starf;&starf;&starf;</option>'
    }).attr('id', 'selectProduct' + productId + 'author' + authorId)
      .find('option[value="' + rating + '"]').prop('selected', true).end();
}
