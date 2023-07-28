<?php
$id  = $_GET['id'];
$qry = $pdo->GetWhere('tb_pangkat', 'id_pangkat', $id);
$row = $qry->fetch(PDO::FETCH_OBJ);

$result = [];
$result = [
    "id_pangkat" => $row->id_pangkat,
    "nama"       => $row->nama,
];

echo json_encode($result);
