<?php

require_once '../config/init.php';

$keyword;
$cat = "";

if (isset($_GET['categorie'])) {
    if (!isset($_GET['keyword'])) {
        $keyword = "%";
    } else {
        $keyword = "%" . $_GET['keyword'] . "%";
    }
    $cat = " AND kategoria_id=".$_GET['categorie'];
} else {
    if (!isset($_GET['keyword'])) {
        $keyword = "%";
        $cat = "";
    }
    else
    {
            $keyword = "%" . $_GET['keyword'] . "%";
    }
}



$sql = 'SELECT munkakor, fizetes, leiras, hely, munkaado FROM allasok WHERE (munkakor LIKE ? OR leiras LIKE ? OR hely LIKE ?) '.$cat;
//kategoria_id,munkaado,munkakor,leiras,fizetes,hely,kapcsolat_id
$stmt = $conn->prepare($sql);

$stmt->bind_param("sss", $keyword, $keyword, $keyword);
$res = $stmt->execute();
//$stmt->store_result();

$stmt->bind_result($munka, $fizetes, $leiras, $hely, $munkaado);

$html = "<table class='table-hover table-striped'>"
        . "<tr>"
        . "<th>Munkakör</th>"
        . "<th>Fizetés</th>"
        . "<th>Leírás</th>"
        . "<th>Hely</th>"
        . "<th>Munkaadó</th>"
        . "</tr>";
//munkakor fizetes leiras hely munkaado

if (!$res) {
    die("Hiba a lekérdezés során.");
}

while ($row = $stmt->fetch()) {
    $html .= "<tr>"
            . "<td>{$munka}</td>"
            . "<td>{$fizetes}</td>"
            . "<td>{$leiras}</td>"
            . "<td>{$hely}</td>"
            . "<td>{$munkaado}</td>"
            . "</tr>";
}
$html .= "</table>";

echo $html;
$stmt->close();
$conn->close();
