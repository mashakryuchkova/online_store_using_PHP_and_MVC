$(document).ready(function () {
    $("#search").on('input', function (event) {
        let q = $(event.target);
        $.ajax({
            url: window.USER_DIR + "/../../catalog/search/",
            data: {"q": q.val()},
            dataType: "html",
            type: "get",
            success: function (html) {
                $("#container").html(html);
            }
        })
    })
})

$(document).ready(function () {
    $('.add-to-fav').click(function (event) {
        event.preventDefault();
        let user_id = $(this).data('user_id');
        let book_id = $(this).data('book_id');
        let data = {
            user_id: user_id,
            book_id: book_id
        };
        let button = $(this);

        $.ajax({
            url: "/kryuchkova/diplom/fav/add/",
            type: "POST",
            data: data,
            dataType: "json",

            success: function (json) {
                button.addClass('favorite');
            },
        });
    });

    $('.items__control[data-action="plus"]').click(function () {
        let counterElement = $(this).siblings('[data-counter]');
        let counterValue = parseInt(counterElement.text());
        counterValue += 1;
        counterElement.text(counterValue);
        $(this).closest('.card__add').find('[name="quantity"]').val(counterValue);
    });

    $('.items__control[data-action="minus"]').click(function () {
        let counterElement = $(this).siblings('[data-counter]');
        let counterValue = parseInt(counterElement.text());
        counterValue -= 1;
        counterValue = Math.max(counterValue, 1);
        counterElement.text(counterValue);
        $(this).closest('.card__add').find('[name="quantity"]').val(counterValue);
    });

    $(document).ready(function () {
        $('.add-to-cart').click(function (event) {
            event.preventDefault();
            let addButton = $(this);
            let cart_id = addButton.data('cart_id');
            let book_id = addButton.data('book_id');
            let quantity = addButton.closest('.card__add').find('[name="quantity"]').val();
            let data = new FormData();
            data.append('cart_id', cart_id);
            data.append('book_id', book_id);
            data.append('quantity', quantity);
            $.ajax({
                url: "/kryuchkova/diplom/cartitems/add/", type: "POST",
                data: data,
                dataType: "json", processData: false,
                contentType: false, success: function (json) {
                    if (json.error !== '') {
                        $('[name="quantity"]').val(1);
                    } else {
                        location.reload();
                        $('[name="quantity"]').val(1);
                    }
                },
            });
        });
    });
});

function openModal() {
    event.preventDefault();
    $('#myModal').modal('show');
    setTimeout(function() {
        $('#myModal').modal('hide');
    }, 2500);
} 