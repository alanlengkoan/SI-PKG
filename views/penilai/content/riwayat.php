    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Hasil Algoritma</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="dashboard">Dashboard</a></li>
                        <li class="active">Hasil Algoritma</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <!-- begin:: tabel -->
                    <div class="card">
                        <div class="card-header">
                            <h5>Tabel</h5>
                        </div>
                        <div class="card-body">
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
                                                <a href="content/riwayat_cetak.php?id_riwayat=<?= $row->id_riwayat ?>" class="btn btn-info btn-sm btn-action" target="_blank"><i class="fa fa-print"></i>&nbsp;Cetak</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end:: tabel -->
                </div>
            </div>
        </div>
    </div>
    </div>