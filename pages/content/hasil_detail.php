<?php
$id_riwayat = $_GET['id_riwayat'];
$sql        = "SELECT r.id_riwayat, g.id_guru, g.nip, g.nama AS guru, g.tmp_lahir, g.tgl_lahir, g.kelamin, j.nama AS jabatan, p.nama AS pangkat, e.nama AS pendidikan, kk.nama AS hasil, r.nilai, r.tgl FROM tb_riwayat AS r LEFT JOIN tb_guru AS g ON g.id_guru = r.id_guru LEFT JOIN tb_jabatan AS j ON j.id_jabatan = g.id_jabatan LEFT JOIN tb_pangkat AS p ON p.id_pangkat = g.id_pangkat LEFT JOIN tb_pendidikan AS e ON e.id_pendidikan = g.id_pendidikan LEFT JOIN tb_kriteria_kat AS kk ON kk.id_kriteria_kat = r.id_kriteria_kat WHERE r.id_riwayat = '$id_riwayat'";
$guru       = $pdo->Query($sql);
$row        = $guru->fetch(PDO::FETCH_OBJ);

// untuk kriteria
$sql_kriteria = "SELECT * FROM tb_kriteria";
$res_kriteria = $pdo->Query($sql_kriteria);
$kriteria     = [];
while ($row_k = $res_kriteria->fetch(PDO::FETCH_OBJ)) {
    $kriteria[$row_k->id_kriteria] = $row_k->nama;
}

// untuk kriteria sub
$sql_kriteria_sub = "SELECT * FROM tb_kriteria_sub";
$res_kriteria_sub = $pdo->Query($sql_kriteria_sub);
$kriteria_sub     = [];
while ($row_s = $res_kriteria_sub->fetch(PDO::FETCH_OBJ)) {
    $kriteria_sub[$row_s->id_kriteria][$row_s->nilai] = $row_s->nama;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistem Pendukung Keputusan" />
    <meta name="keywords" content="Sistem Pendukung Keputusan" />
    <meta name="author" content="Sistem Pendukung Keputusan" />
    <title>Sistem Pendukung Keputusan</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">

    <!-- begin:: icon -->
    <link rel="apple-touch-icon" href="./../assets/admin/images/icon/apple-touch-icon.png" sizes="180x180" />
    <link rel="icon" href="./../assets/admin/images/icon/favicon-32x32.png" type="image/x-icon" sizes="32x32" />
    <link rel="icon" href="./../assets/admin/images/icon/favicon-16x16.png" type="image/x-icon" sizes="16x16" />
    <link rel="icon" href="./../assets/admin/images/icon/favicon.ico" type="image/x-icon" />
    <!-- end:: icon -->

    <!-- begin:: global assets -->
    <link rel="stylesheet" type="text/css" href="./../assets/page/vendor/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="./../assets/page/vendor/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="./../assets/page/css/style.css" />
    <!-- end:: global assets -->
</head>

<body>
    <!-- begin:: navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index">Sistem Informasi</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item <?= ($_REQUEST['content'] == "index") ? 'active' : '' ?>">
                        <a class="nav-link" href="index">Home</a>
                    </li>
                    <li class="nav-item <?= ($_REQUEST['content'] == "hasil") ? 'active' : '' ?>">
                        <a class="nav-link" href="hasil">Hasil Penilaian</a>
                    </li>
                    <li class="nav-item <?= ($_REQUEST['content'] == "tentang") ? 'active' : '' ?>">
                        <a class="nav-link" href="tentang">Tentang</a>
                    </li>
                    <li class="nav-item <?= ($_REQUEST['content'] == "login") ? 'active' : '' ?>">
                        <a class="nav-link" href="login">Masuk</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end:: navbar -->

    <!-- begin:: header -->
    <header class="intro-header">
        <div class="container">
            <div class="intro-message">
                <h1>Sistem Informasi Penilaian Kinerja Guru</h1>
                <h3>SDK PATONGLOAN KECAMATAN PANA</h3>
                <hr class="intro-divider">
            </div>
        </div>
    </header>
    <!-- end:: header -->

    <!-- begin:: content -->
    <section class="content">
        <div class="container">
            <h2 class="text-center">Hasil Penilaian Kinerja Guru <?= $row->guru ?></h2>
            <hr class="intro-divider">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Detail Hasil Penilaian</strong>
                        </div>
                        <form class="form-horizontal">
                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label class=" form-control-label">NIP</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" class="form-control-plaintext form-control-sm" value="<?= $row->nip ?>" />
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label class=" form-control-label">Nama</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" class="form-control-plaintext form-control-sm" value="<?= $row->guru ?>" />
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label class=" form-control-label">Tempat Lahir</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" class="form-control-plaintext form-control-sm" value="<?= $row->tmp_lahir ?>" />
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label class=" form-control-label">Tanggal Lahir</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" class="form-control-plaintext form-control-sm" value="<?= $myfun->tanggal_indo($row->tgl_lahir) ?>" />
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label class=" form-control-label">Jenis Kelamin</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" class="form-control-plaintext form-control-sm" value="<?= ($row->kelamin === 'L' ? 'Laki - laki' : 'Perempuan') ?>" />
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label class=" form-control-label">Jabatan</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" class="form-control-plaintext form-control-sm" value="<?= $row->jabatan ?>" />
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label class=" form-control-label">Pangkat</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" class="form-control-plaintext form-control-sm" value="<?= $row->pangkat ?>" />
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label class=" form-control-label">Pendidikan</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" class="form-control-plaintext form-control-sm" value="<?= $row->pendidikan ?>" />
                                    </div>
                                </div>
                                <hr />
                                <?php
                                $penilaian = $pdo->GetWhere('tb_penilaian', 'id_guru', $row->id_guru);
                                $nilai     = [];
                                while ($row_p = $penilaian->fetch(PDO::FETCH_OBJ)) {
                                    $nilai[] = $row_p->nilai;
                                ?>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label class="form-control-label"><?= $kriteria[$row_p->id_kriteria] ?></label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" class="form-control-plaintext form-control-sm" value="<?= $kriteria_sub[$row_p->id_kriteria][$row_p->nilai] ?>" />
                                        </div>
                                    </div>
                                <?php  } ?>
                                <hr />
                                <?php
                                $nilai_akhir      = array_sum($nilai) / count($kriteria);
                                $sql_kriteria_kat = "SELECT * FROM tb_kriteria_kat WHERE nilai_min <= $nilai_akhir AND nilai_max >= $nilai_akhir";
                                $res_kriteria_kat = $pdo->Query($sql_kriteria_kat);
                                $row_kriteria_kat = $res_kriteria_kat->fetch(PDO::FETCH_OBJ);
                                ?>
                                <div class="text-center">
                                    Skor Akhir : <b><?= $nilai_akhir ?></b>
                                    <br />
                                    Kategori : <b><?= $row_kriteria_kat->nama ?></b>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end:: content -->

    <!-- begin:: footer -->
    <footer>
        <div class="container">
            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="index">Home</a>
                </li>
                <li class="footer-menu-divider list-inline-item">&sdot;</li>
                <li class="list-inline-item">
                    <a href="hasil">Hasil Penilaian</a>
                </li>
                <li class="footer-menu-divider list-inline-item">&sdot;</li>
                <li class="list-inline-item">
                    <a href="tentang">Tentang</a>
                </li>
                <li class="footer-menu-divider list-inline-item">&sdot;</li>
                <li class="list-inline-item">
                    <a href="login">Masuk</a>
                </li>
            </ul>
            <p class="copyright text-muted small">
            </p>
        </div>
    </footer>
    <!-- end:: footer -->

    <script src="./../assets/page/vendor/jquery/jquery.min.js"></script>
    <script src="./../assets/page/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./../assets/admin/my_assets/my_fun.js"></script>
</body>

</html>