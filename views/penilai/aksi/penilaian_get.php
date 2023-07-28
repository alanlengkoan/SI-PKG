<?php
$id   = $_GET['id'];
$qry1 = $pdo->GetWhere('tb_penilaian', 'id_guru', $id);
$qry2 = $pdo->GetWhere('tb_penilaian', 'id_guru', $id);

$result = [];
$row = $qry1->fetch(PDO::FETCH_OBJ);
$result['id_guru'] = $row->id_guru;

$cow = 0;
while ($rows = $qry2->fetch(PDO::FETCH_OBJ)) {
    $result['nilai_' . $cow++] = $rows->nilai;
}

echo json_encode($result);
