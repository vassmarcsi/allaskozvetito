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
                window.location = "index.php";
                //$("#logouthref").attr('class', 'nav-link');
                //$("#upload").attr('class', 'nav-link');
                //$("#loginhref").attr('class', 'nav-link disabled d-none');
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
        //
        //let katid = $("[name=katid]").val();
        let katid = $('input[name="katid"]:checked').val();
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
            success: function (valasz) {
                console.log("Sikeres feltöltés.");
                console.log(valasz);
            }
        });
    });//álláa feltöltés vége

    //állások lekérdezése
    $('.search').on('submit', function (e) {
        e.preventDefault(); //alapértelmezett működést akadályozza meg
    });

    $("[name=search]").click(function () {
        //console.log("Működik?");
        let kulcsszo = $("#keyword").val();
        kulcsszo = kulcsszo.trim();
        let kat = $("#kategoria").val();
        if (kat == 0)
        {
            $.get("php/search.php", {keyword: kulcsszo}, function (valasz) {
                $("#jobs").html(valasz);
            });
        } else
        {
            $.get("php/search.php", {keyword: kulcsszo, categorie: kat}, function (valasz) {
                $("#jobs").html(valasz);
            });
        }

    });//álláa feltöltés vége

    //betöltéskor minden állást betölt
    $.get("php/search.php", {keyword: ""}, function (valasz) {
        $("#jobs").html(valasz);
    });

    //betöltődéskor a felhasznált kategóriák megjelenítése
    $.get("php/kategoria.php", {}, function (valasz) {
        $("#kategoria").html(valasz);
    });
});