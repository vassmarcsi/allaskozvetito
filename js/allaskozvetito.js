$(document).ready(function () {
    //$("#login").css('display', 'none');
    $('#login-form').on('submit', function (e) {
        e.preventDefault(); //alapértelmezett működést akadályozza meg
    });

    $("[name=enter]").click(function () {
        let email = $('#email').val();
        let jelszo = $('#pwd').val();
        $.ajax({
            method: "POST",
            url: "php/log_in.php",
            data: {
                email: email,
                jelszo: jelszo
            },
            success: function (valasz) {
                console.log(valasz);
                $("#logouthref").attr('class', 'nav-link');
                $("#upload").attr('class', 'nav-link');
                $("#loginhref").attr('class', 'nav-link disabled d-none');
                //$("#login").css('display', 'none');
                //$("#logout").css('display', 'inline');
            },
            error: function (statusz) {
                console.log(statusz);
            }
        })
    });
});