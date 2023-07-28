<?php
$nip = strip_tags($_POST['nip']);
$nma = strip_tags($_POST['nama']);
$tmp = strip_tags($_POST['tmp_lahir']);
$tgl = strip_tags($_POST['tgl_lahir']);
$kel = strip_tags($_POST['kelamin']);
$jab = strip_tags($_POST['id_jabatan']);
$pan = strip_tags($_POST['id_pangkat']);
$pen = strip_tags($_POST['id_pendidikan']);

$error = [];
foreach ($_POST as $key => $value) {
  if ($value == '') {
    $error[$key] = 'Kolom ini harus diisi.';
  }
  if (is_array($value)) {
    for ($c = 0; $c < count($value); $c++) {
      $check_value_arr = trim($value[$c]);
      if (empty($check_value_arr)) {
        $error[] = $c;
      }
    }
  }
}

if (count($error) != 0) {
  exit(json_encode(array('title' => 'Gagal!', 'text' => 'Data gagal ditambahkan!', 'type' => 'error', 'button' => 'Ok!', 'errors' => $error)));
} else {
  if (empty($_POST['id_guru'])) {
    $ins = $pdo->Insert("tb_guru", ["nip", "nama", "tmp_lahir", "tgl_lahir", "kelamin", "id_jabatan", "id_pangkat", "id_pendidikan"], [$nip, $nma, $tmp, $tgl, $kel, $jab, $pan, $pen]);
    if ($ins == 1) {
      exit(json_encode(array('title' => 'Berhasil!', 'text' => 'Data ditambah!', 'type' => 'success', 'button' => 'Ok!')));
    } else {
      exit(json_encode(array('title' => 'Gagal!', 'text' => 'Data gagal ditambahkan!', 'type' => 'error', 'button' => 'Ok!')));
    }
  } else {
    $id = strip_tags($_POST['id_guru']);
    $upd = $pdo->Update("tb_guru", 'id_guru', $id, ["nip", "nama", "tmp_lahir", "tgl_lahir", "kelamin", "id_jabatan", "id_pangkat", "id_pendidikan"], [$nip, $nma, $tmp, $tgl, $kel, $jab, $pan, $pen]);
    if ($upd == 1) {
      exit(json_encode(array('title' => 'Berhasil!', 'text' => 'Data diubah.', 'type' => 'success', 'button' => 'Ok!')));
    } else {
      exit(json_encode(array('title' => 'Gagal!', 'text' => 'Data tidak diubah.', 'type' => 'error', 'button' => 'Ok!')));
    }
  }
}
