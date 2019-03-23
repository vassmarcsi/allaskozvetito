<?php

function print_html($fajl) {
    echo file_get_contents($fajl);
}

function dd($variant) {
    var_dump($variant);
    die();
}

function is_logged() {
    if (!isset($_SESSION['userid'])) {
        /*header("Location: index.php");
        die();
        return false;*/
        return false;
    }
    else
    {
        return true;
    }
}

function menu() {
    if (is_logged()) {
        print_html("html/navigacio_in.html");
    } else {
        print_html("html/navigacio_out.html");
    }
}
