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
    <link rel="stylesheet" type="text/css" href="./../assets/admin/css/lib/datatable/dataTables.bootstrap.min.css">
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
            <h2 class="text-center">Hasil Penilaian Kinerja Guru SDK PATONGLOAN KECAMATAN PANA</h2>
            <hr class="intro-divider">
            <div class="row">
                <div class="col-lg-12">
                    <!-- begin:: tabel -->
                    <table id="data-table" class="table table-striped table-bordered">
                        <thead align="center">
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Nilai</th>
                                <th>Hasil Penilaian</th>
                                <th>Tanggal Penilaian</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody align="center">
                            <?php
                            $sql = "SELECT r.id_riwayat, g.nama AS guru, kk.nama AS hasil, r.nilai, r.tgl FROM tb_riwayat AS r LEFT JOIN tb_guru AS g ON g.id_guru = r.id_guru LEFT JOIN tb_kriteria_kat AS kk ON kk.id_kriteria_kat = r.id_kriteria_kat ORDER BY r.id_riwayat";
                            $qry = $pdo->Query($sql);
                            $sum = $qry->rowCount();
                            $no  = 1;

                            while ($row = $qry->fetch(PDO::FETCH_OBJ)) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row->guru ?></td>
                                    <td><?= $row->nilai ?></td>
                                    <td><?= $row->hasil ?></td>
                                    <td><?= $row->tgl ?></td>
                                    <td>
                                        <a href="hasil_detail&id_riwayat=<?= $row->id_riwayat ?>" class="btn btn-info btn-sm btn-action" target="_blank"><i class="fa fa-info-circle"></i>&nbsp;Detail</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <!-- end:: tabel -->
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
    <script src="./../assets/admin/js/lib/data-table/datatables.min.js"></script>
    <script src="./../assets/admin/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="./../assets/admin/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="./../assets/admin/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="./../assets/admin/js/lib/data-table/jszip.min.js"></script>
    <script src="./../assets/admin/js/lib/data-table/pdfmake.min.js"></script>
    <script src="./../assets/admin/js/lib/data-table/vfs_fonts.js"></script>
    <script src="./../assets/admin/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="./../assets/admin/js/lib/data-table/buttons.print.min.js"></script>
    <script src="./../assets/admin/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="./../assets/admin/js/lib/data-table/datatables-init.js"></script>

    <script>
        $('#data-table').DataTable();
    </script>
</body>

</html>