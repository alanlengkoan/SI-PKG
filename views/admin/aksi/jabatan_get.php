<?php
$id  = $_GET['id'];
$qry = $pdo->GetWhere('tb_jabatan', 'id_jabatan', $id);
$row = $qry->fetch(PDO::FETCH_OBJ);

$result = [];
$result = [
    "id_jabatan" => $row->id_jabatan,
    "nama"       => $row->nama,
];

echo json_encode($result);
