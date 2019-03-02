<?php

require_once 'config/init.php';

if(!isset($_SESSION['userid'])){
    header("Location: index.php");
    die();
}

print_html("html/header.html");
print_html("html/navigacio.html");
print_html("html/feltolt.html");
print_html("html/footer.html");