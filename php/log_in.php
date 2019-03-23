<?php

require_once '../config/init.php';

//'REQUEST_METHOD'
//Which request method was used to access the page; i.e. 'GET', 'HEAD', 'POST', 'PUT'. 

if (($_SERVER['REQUEST_METHOD'] == "POST") && isset($_POST['email']) && isset($_POST['jelszo'])) {
    $email = $_POST['email'];
    $jelszo = $_POST['jelszo'];

    $sql = 'SELECT * FROM kapcsolatok WHERE email = ? AND jelszo = ?;';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $jelszo);
    $stmt->execute();
    $stmt->store_result(); //lekérdezés eredményét belementi



    if ($stmt->num_rows == 1) {
        //belépett
        $stmt->bind_result($id, $nev, $email, $jelszo);
        $stmt->fetch();
        $_SESSION['userid'] = $id;
        //echo 'Beléptél';
    } else {
        //helytelen felhasználónév vagy jelszó
        echo 'Helytelen felhasználónév vagy jelszó';
        $_SESSION['login_error'] = "Helytelen felhasználónév vagy jelszó";
    }
    $stmt->close();
}