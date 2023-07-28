<?php
$id  = $_GET['id'];
$qry = $pdo->GetWhere('tb_pendidikan', 'id_pendidikan', $id);
$row = $qry->fetch(PDO::FETCH_OBJ);

$result = [];
$result = [
    "id_pendidikan" => $row->id_pendidikan,
    "nama"          => $row->nama,
];

echo json_encode($result);
