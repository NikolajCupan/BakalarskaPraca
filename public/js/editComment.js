$('.editReviewClass').click(function() {
    let productId = $(this).data('product-id');
    let authorId = $(this).data('author-id');
    let rating = $(this).data('rating');

    if ($(this).hasClass('editReviewClassActive'))
    {
        let textArea = $('#activeProduct' + productId + 'author' + authorId);
        let button = $(this);
        let starsSelect = $('#selectProduct' + productId + 'author' + authorId);

        $.ajax({
            url: "/user/editReview",
            method: 'POST',
            data: {
                productId: productId,
                authorId: authorId,
                text: textArea.val(),
                rating: starsSelect.find(":selected").val()
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                let paragraph = $('<p>', {
                    id: 'product' + productId + 'author' + authorId,
                    class: 'wrapText m-b-5 m-t-10'
                });
                paragraph.text(textArea.val());

                textArea.replaceWith(paragraph);

                button.css('color', 'inherit');
                button.removeClass('editReviewClassActive');
                starsSelect.remove();
            },
            error: function() {
                alert('Ajax zlyhal');
            }
        });
    }
    else
    {
        let review = $('#product' + productId + 'author' + authorId);

        let textarea = $('<textarea>', {
            id: 'activeProduct' + productId + 'author' + authorId,
            class: 'm-b-5 m-t-10'
        });
        textarea.width(review.innerWidth());
        textarea.height(review.innerHeight() + 20);
        textarea.css('min-height', '40px');
        textarea.addClass('form-control');
        textarea.val(review[0].innerText);

        $(this).css('color', 'red');
        $(this).addClass('editReviewClassActive');

        review.replaceWith(textarea);

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
