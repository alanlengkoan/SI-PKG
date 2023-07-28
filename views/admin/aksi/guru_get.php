<?php
$id  = $_GET['id'];
$qry = $pdo->GetWhere('tb_guru', 'id_guru', $id);
$row = $qry->fetch(PDO::FETCH_OBJ);

$result = [];
$result = [
    "id_guru"       => $row->id_guru,
    "nip"           => $row->nip,
    "nama"          => $row->nama,
    "tmp_lahir"     => $row->tmp_lahir,
    "tgl_lahir"     => $row->tgl_lahir,
    "kelamin"       => $row->kelamin,
    "id_jabatan"    => $row->id_jabatan,
    "id_pangkat"    => $row->id_pangkat,
    "id_pendidikan" => $row->id_pendidikan,
];

echo json_encode($result);
