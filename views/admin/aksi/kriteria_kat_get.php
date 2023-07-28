<?php
$id  = $_GET['id'];
$qry = $pdo->GetWhere('tb_kriteria_kat', 'id_kriteria_kat', $id);
$row = $qry->fetch(PDO::FETCH_OBJ);

$result = [];
$result = [
    "id_kriteria_kat" => $row->id_kriteria_kat,
    "nama"            => $row->nama,
    "nilai_min"       => $row->nilai_min,
    "nilai_max"       => $row->nilai_max
];

echo json_encode($result);
