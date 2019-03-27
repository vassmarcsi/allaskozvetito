<?php

require_once '../config/init.php';

$sql = "SELECT DISTINCT kategoriak.kategoria, kategoriak.id FROM kategoriak, allasok WHERE allasok.kategoria_id = kategoriak.id";

$res = $conn->query($sql);
if (!$res) {
    die();
}

$html = "";
$html .= "<option value='0'>Kérem válasszon!</option>";
while($row = $res -> fetch_array())
{
    $html .= "<option value='{$row[1]}'>{$row[0]}</option>";
}

echo $html;
$conn -> close();