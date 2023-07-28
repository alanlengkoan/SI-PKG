  <?php
    $id_guru = $_GET['id_guru'];
    $sql     = "SELECT g.id_guru, g.nip, g.nama, g.tmp_lahir, g.tgl_lahir, g.kelamin, j.nama AS jabatan, p.nama AS pangkat, e.nama AS pendidikan FROM tb_guru AS g LEFT JOIN tb_jabatan AS j ON j.id_jabatan = g.id_jabatan LEFT JOIN tb_pangkat AS p ON p.id_pangkat = g.id_pangkat LEFT JOIN tb_pendidikan AS e ON e.id_pendidikan = g.id_pendidikan WHERE g.id_guru = '$id_guru'";
    $guru    = $pdo->Query($sql);
    $row     = $guru->fetch(PDO::FETCH_OBJ);

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
                  <!-- begin:: form -->
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
                                      <input type="text" class="form-control-plaintext form-control-sm" value="<?= $row->nama ?>" />
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
                                $penilaian = $pdo->GetWhere('tb_penilaian', 'id_guru', $id_guru);
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
                  <!-- end:: form -->
              </div>
          </div>
      </div>
  </div>
  </div>