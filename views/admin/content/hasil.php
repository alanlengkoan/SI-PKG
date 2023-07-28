 <div class="breadcrumbs">
     <div class="col-sm-4">
         <div class="page-header float-left">
             <div class="page-title">
                 <h1>Hasil Penilaian</h1>
             </div>
         </div>
     </div>
     <div class="col-sm-8">
         <div class="page-header float-right">
             <div class="page-title">
                 <ol class="breadcrumb text-right">
                     <li><a href="dashboard">Dashboard</a></li>
                     <li class="active">Hasil Penilaian</li>
                 </ol>
             </div>
         </div>
     </div>
 </div>

 <div class="content mt-3">
     <div class="animated fadeIn">
         <div class="row">
             <div class="col-lg-12">
                 <?php
                    // untuk guru
                    $sql_guru = "SELECT * FROM tb_guru";
                    $res_guru = $pdo->Query($sql_guru);
                    $guru     = [];
                    while ($row_a = $res_guru->fetch(PDO::FETCH_OBJ)) {
                        $guru[$row_a->id_guru] = $row_a->nama;
                    }

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

                    // untuk penilaian
                    $sql_penilaian = "SELECT * FROM tb_penilaian ORDER BY id_guru, id_kriteria";
                    $res_penilaian = $pdo->Query($sql_penilaian);
                    $penilaian     = [];
                    while ($row_e = $res_penilaian->fetch(PDO::FETCH_OBJ)) {
                        $penilaian[$row_e->id_guru][$row_e->id_kriteria] = $row_e->nilai;
                    }
                    ?>

                 <!-- begin:: tabel -->
                 <div class="card">
                     <div class="card-header">
                         <h5>Tabel</h5>
                     </div>
                     <div class="card-body">
                         <table id="data-table" class="table table-striped table-bordered">
                             <thead align="center">
                                 <tr>
                                     <th>No</th>
                                     <th>Guru</th>
                                     <?php foreach ($kriteria as $key => $value) { ?>
                                         <th><?= $value ?></th>
                                     <?php } ?>
                                     <th>Aksi</th>
                                 </tr>
                             </thead>
                             <tbody align="center">
                                 <?php
                                    $no = 1;
                                    foreach ($penilaian as $key => $value) { ?>
                                     <tr>
                                         <td><?= $no++ ?></td>
                                         <td><?= $guru[$key] ?></td>
                                         <?php
                                            foreach ($value as $k => $v) { ?>
                                             <td><?= $kriteria_sub[$k][$v] ?></td>
                                         <?php } ?>
                                         <td>
                                             <a href="hasil_detail&id_guru=<?= $key ?>" class="btn btn-primary btn-sm btn-action" target="_blank">
                                                 <i class="fa fa-eye"></i> Detail
                                             </a>
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