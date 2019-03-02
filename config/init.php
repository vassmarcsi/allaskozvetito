<?php

session_start();

$appLocation = $_SERVER['DOCUMENT_ROOT']."/allaskozvetito"; //gyökér könyvtár

require_once $appLocation.'/config/connect.php';
require_once $appLocation.'/config/functions.php';