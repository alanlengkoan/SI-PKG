<?php
$id_g = strip_tags($_POST['id_guru']);
$id_k = array_map("strip_tags", $_POST['id_kriteria']);
$nil  = array_map("strip_tags", $_POST['nilai']);

$error = [];
foreach ($_POST as $key => $value) {
  if ($value == '') {
    $error[$key] = 'Kolom ini harus diisi.';
  }
  if (is_array($value)) {
    for ($c = 0; $c < count($value); $c++) {
      $check_value_arr = trim($value[$c]);
      if (empty($check_value_arr)) {
        $error['nilai_' . $c] = 'Kolom ini harus diisi.';
      }
    }
  }
}

if (count($error) != 0) {
  exit(json_encode(array('title' => 'Gagal!', 'text' => 'Data gagal ditambahkan!', 'type' => 'error', 'button' => 'Ok!', 'errors' => $error)));
} else {
  if ($_POST['action'] === 'add') {
    // tambah
    $qry = $pdo->GetWhere('tb_penilaian', 'id_guru', $id_g);
    $sum = $qry->rowCount();

    if ($sum != 0) {
      exit(json_encode(array('title' => 'Gagal!', 'text' => 'Maaf, data yang Anda masukkan telah diproses!', 'type' => 'warning', 'button' => 'Ok!')));
    } else {
      for ($i = 0; $i < count($id_k); $i++) {
        $pdo->Insert("tb_penilaian", ["id_guru", "id_kriteria", "nilai"], [$id_g, $id_k[$i], $nil[$i]]);
      }
      save_riwayat($id_g, $pdo);
      exit(json_encode(array('title' => 'Berhasil!', 'text' => 'Data ditambah.', 'type' => 'success', 'button' => 'Ok!')));
    }
  } else {
    // ubah
    for ($i = 0; $i < count($id_k); $i++) {
      $sql = "UPDATE tb_penilaian SET nilai = $nil[$i] WHERE id_kriteria = $id_k[$i] AND id_guru = '$id_g'";
      $qry = $pdo->Query($sql);
    }
    save_riwayat($id_g, $pdo);
    exit(json_encode(array('title' => 'Berhasil!', 'text' => 'Data ditambah.', 'type' => 'success', 'button' => 'Ok!')));
  }
}

function save_riwayat($id_guru, $pdo)
{
  // untuk simpan ke tabel riwayat
  $sql_kriteria = "SELECT * FROM tb_kriteria";
  $res_kriteria = $pdo->Query($sql_kriteria);
  $kriteria     = [];
  while ($row_k = $res_kriteria->fetch(PDO::FETCH_OBJ)) {
    $kriteria[$row_k->id_kriteria] = $row_k->nama;
  }

  $qry = $pdo->GetWhere('tb_penilaian', 'id_guru', $id_guru);
  $sum = $qry->rowCount();
  $nil = [];
  while ($row = $qry->fetch(PDO::FETCH_OBJ)) {
    $nil[] = $row->nilai;
  }

  $nilai_akhir = array_sum($nil) / count($kriteria);
  $sql_kriteria_kat = "SELECT * FROM tb_kriteria_kat WHERE nilai_min <= $nilai_akhir AND nilai_max >= $nilai_akhir";
  $res_kriteria_kat = $pdo->Query($sql_kriteria_kat);
  $row_kriteria_kat = $res_kriteria_kat->fetch(PDO::FETCH_OBJ);

  $pdo->Insert("tb_riwayat", ["id_guru", "id_kriteria_kat", "nilai", "tgl"], [$id_guru, $row_kriteria_kat->id_kriteria_kat, $nilai_akhir, date('Y-m-d')]);
}
