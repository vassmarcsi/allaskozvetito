<?php

session_start();
require_once 'config/connect.php';
require_once 'config/functions.php';

print_html("html/header.html");
print_html("html/navigacio.html");
echo '<div class="jumbotron text-center">Feltöltés alatt... Nézz vissza később! &#9785;</div>';
print_html("html/footer.html");

?>
