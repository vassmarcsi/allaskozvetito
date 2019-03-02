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

    $("[name=feltolt]").click(function () {
        //katid, munkaado, munkakor, hely, leiras, fizetes
        let katid = $("[name=katid]").val();
        let munkaado = $("[name=munkaado]").val();
        let munkakor = $("[name=munkakor]").val();
        let hely = $("[name=hely]").val();
        let leiras = $("[name=leiras]").val();
        let fizetes = $("[name=fizetes]").val();

        $.ajax({
            method: "POST",
            url: "php/fel_tolt.php",
            data: {
                katid: katid,
                munkaado: munkaado,
                munkakor: munkakor,
                hely: hely,
                leiras: leiras,
                fizetes: fizetes
            },
            success: function(valasz){
                console.log("Sikeres feltöltés.");
                console.log(valasz);
            }
        });
    });//álláa feltöltés vége
});