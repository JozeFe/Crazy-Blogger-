$(document).ready(
    function () {
        $('button.deleteArticle').click(function() {
            if (confirm("Delete this match?")) {
                var id = $(this).attr('value');
                var url = "?controller=articles&action=delete&id=" + id;
                var row = $(this).parent().parent();
                $.ajax({
                    type: "POST",
                    url: url,
                    cache: false,
                    success: function (data) {
                        row.fadeOut('fast', function () {
                            $(this).remove();
                        });
                    },
                    error: function (xhr, opts, error) {
                        alert("Error");
                    }
                });
            }
        });

        $('button.articlesPageButton').click(function() {
            var id = $(this).attr('value');
            //var url = "routes.php?controller=articles&action=ajaxPage&page=" + id;
            var url = "ajax.php?page=" + id;
            $.ajax({
                type: "POST",
                url: url,
                dataType: 'json',
                cache: false,
                success: function (data) {
                    $("#articlesList").html('');
                    $.each(data, function(index, element) {
                        /*
                        $('#articlesList').append('<div class="artBorder"><h4>' + element['title'] + '<small> ' + element['date'] + '</small></h4>');
                        $('#articlesList').append('<p>' + element['description'] + '</p>');
                        $('#articlesList').append('<a class="btn btn-default" href="?controller=articles&action=p_show&id=' + element['id'] + '" role="button">Read more >></a></div>');
                        */
                        $('#articlesList').append('<div class="artBorder">' +
                                                    '<h4>' + element['title'] + '<small> ' + element['date'] + '</small></h4>' +
                                                    '<p>' + element['description'] + '</p>' +
                                                    '<a class="btn btn-primary" href="?controller=articles&action=p_show&id=' + element['id'] + '" role="button">Read more >></a>' +
                                                  '</div>');
                    });
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        });
    }
);

function validateLoginForm() {
    var username = document.forms["loginForm"]["inputUsername"].value;
    var password = document.forms["loginForm"]["inputPassword"].value;
    if (username == null || username == "") {
        alert("Username is empty!");
        return false;
    }
    if (!username.match(/^[a-zA-Z0-9]*$/)) {
        alert("Username - Only letters and numbers allowed!");
        return false;
    }
    if (password == null || password == "") {
        alert("Password is empty!");
        return false;
    }
}

function validateSignUpForm() {
    var username = document.forms["signUp"]["inputUsername"].value;
    var password = document.forms["signUp"]["inputPassword"].value;
    var confirmPassword = document.forms["signUp"]["inputConfirmPassword"].value;
    if (username == null || username == "") {
        alert("Username is empty!");
        return false;
    }
    if (!username.match(/^[a-zA-Z0-9]*$/)) {
        alert("Username - Only letters and numbers allowed!");
        return false;
    }
    if (password == null || password == "") {
        alert("Password is empty!");
        return false;
    }
    if (password != confirmPassword) {
        alert("Passwords are not equal!");
        return false;
    }
}