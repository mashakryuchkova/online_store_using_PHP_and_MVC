$(document).ready(function () {
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

$('.add-to-fav').click(function () {
    var button = $(this);
    var user_id = button.data('user_id');
    var book_id = button.data('book_id');
    var isFavorite = button.hasClass('favorite');
    
    if (isFavorite) {
        favDelete(user_id, book_id, button);
    } else {
        favAdd(user_id, book_id, button);
    }
});

function favAdd(user_id, book_id, button) {
    $.ajax({
        url: window.BASE_DIR + "/../../fav/add/",
        data: {
            user_id: user_id,
            book_id: book_id
        },
        dataType: "json",
        type: "POST",
        success: function (json) {
            if (json.error === "") {
                button.find('svg path').attr('fill', 'red');
                button.addClass('favorite');
            } else {
                alert("Error");
            }
        }
    });
}

function favDelete(user_id, book_id, button) {
    $.ajax({
        url: window.BASE_DIR + "/../../fav/del/",
        data: {
            user_id: user_id,
            book_id: book_id
        },
        dataType: "json",
        type: "POST",
        success: function (json) {
            if (json.error === "") {
                button.find('svg path').attr('fill', 'black');
                button.removeClass('favorite');
            } else {
                alert("Error");
            }
        }
    });
}

function allFavDelete(user_id) {
    if (confirm(`Вы уверены, что хотите убрать все из избранного?`)) {
        $.ajax({
            url: window.BASE_DIR + "/../../fav/all_del/",
            data: {user_id: user_id},
            dataType: "json",
            type: "POST",
            success: function (json) {
                if (json.success) {
                    location.reload();
                } else {
                    alert('error');
                }
            },
            error: function () {
                alert('error');
            }
        });
    }
}

function openModal() {
    event.preventDefault();
    $('#myModal').modal('show');
    setTimeout(function() {
        $('#myModal').modal('hide');
    }, 2500);
} 