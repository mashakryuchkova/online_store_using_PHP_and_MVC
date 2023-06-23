$(document).ready(function () {
    $('#form_new_genre').submit(function (event) {
        event.preventDefault();

        let depth_level = $('#form_new_genre select option:selected').data("depth-level") + 1;
        $('#form_new_genre input[name = "depth_level"]').val(depth_level);
        
        let data = $('#form_new_genre').serializeArray();
        $.ajax({
            url: window.BASE_DIR + "/genres/add/",
            data: data,
            dataType: "json",
            type: "POST",
            success: function (json) {
                if (json.error > 0) {
                    $("#new_genre_modal .error_danger").show();
                } else {
                    location.reload();
                }
            }
        })
    })

    $("#search").on('input', function (event) {
        let q = $(event.target);
        $.ajax({
            url: window.BASE_DIR + "/genres/search/",
            data: {"q": q.val()},
            dataType: "html",
            type: "get",
            success: function (html) {
                $("#table_container").html(html);
                
            }
        })
    })
})

function genreDelete(id, name) {
    if (confirm(`Вы уверены, что хотите удалить жанр ${name} с id = ${id}?`)) {
        $.ajax({
            url: window.BASE_DIR + "/genres/del/",
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
}

function getEditFormById(id) {
    $.ajax({
        url: window.BASE_DIR + "/genres/getEditFormById/" + id + "/",
        dataType: "html",
        type: "POST",
        success: function (html) {
            $('div.main').append(html);
            $('#edit_genre_modal').on('hidden.bs.modal', function (e) {
                $(e.target).remove();
            })
            $('#edit_genre_modal').modal('show');
        }
    })
}

function genreEdit() {
    let depth_level = $('#form_edit_genre select option:selected').data("depth-level") + 1;
    $('#form_edit_genre input[name = "depth_level"]').val(depth_level);
    let data = $('#form_edit_genre').serializeArray();
    $.ajax({
        url: window.BASE_DIR + "/genres/edit/",
        data: data,
        dataType: "json",
        type: "POST",
        success: function (json) {
            if (json.error > 0) {
                $("#form_edit_genre .error_danger").show();
            } else {
                location.reload();
            }
        }
    })
}