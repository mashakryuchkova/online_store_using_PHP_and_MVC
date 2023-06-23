$(document).ready(function () {

});

function submitOrder(order_id, currentUserId) {
    let cartItems = document.getElementsByClassName("cart-item");
    let books = [];

    for (let i = 0; i < cartItems.length; i++) {
        let cartItem = cartItems[i];

        let bookId = parseInt(cartItem.getElementsByClassName("item-details")[0].getElementsByTagName("h4")[0].innerText);
        let bookName = cartItem.getElementsByClassName("item-details")[0].getElementsByTagName("h4")[0].innerText;
        let bookAuthor = cartItem.getElementsByClassName("item-details")[0].getElementsByTagName("h4")[1].innerText;
        let bookPrice = parseInt(cartItem.getElementsByClassName("item-details")[0].getElementsByTagName("h5")[0].innerText);
        let bookQuantity = parseInt(cartItem.getElementsByClassName("items__control")[0].innerText);

        let book = {
            id: bookId,
            name: bookName,
            author: bookAuthor,
            price: bookPrice,
            quantity: bookQuantity
        };
        books.push(book);
    }

    let data = new FormData();

    data.append('order_id', order_id);
    data.append('books', JSON.stringify(books));

    $.ajax({
        
        url: window.BASE_DIR + "/../../orderitems/add/",
        type: "POST",
        data: data,
        processData: false,
        contentType: false,
        success: function (response) {
            $.ajax({
                url: window.BASE_DIR + "/../../orders/completed/",
                type: "POST",
                data: data,
                processData: false,
                contentType: false,
                success: function (response) {
                    allDelete(currentUserId);
                    alert('Спасибо за заказ!');
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        },
        error: function (xhr, status, error) {
            console.error(error);
            alert("Произошла ошибка при оформлении заказа.");
        }
    });
}

function cartDelete(id) {
    $.ajax({
        url: window.BASE_DIR + "/../../cartitems/del/",
        data: {id: id},
        dataType: "json",
        type: "POST",
        success: function (json) {
            if (json.error > 0) {
                alert("Error");
            } else {
                location.reload();
            }
        }
    })
}

function allDelete(currentUserId) {
    $.ajax({
        url: window.BASE_DIR + "/../../cartitems/all_del/",
        data: {
            cart_id: currentUserId
        },
        dataType: "json",
        type: "POST",
        success: function (json) {
            if (json.success) {
                location.reload();
            } else {
                alert("Ошибка при очистке корзины");
            }
        }
    });
}