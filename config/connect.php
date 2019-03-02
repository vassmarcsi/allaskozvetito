<?php

//$host = "10.0.14.100";
//$user = "esti_szoftverf";
//$pwd = "esti_szoftverf";
//$dbName = "esti_allaskozvetito";

$conn = new mysqli("10.0.14.100", "esti_szoftverf", "esti_szoftverf", "esti_allaskozvetito");

if($conn -> connect_errno)
{
    die("Sikertelen csatlakozás!");
}

$conn ->set_charset("utf-8");