    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Users</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="dashboard">Dashboard</a></li>
                        <li class="active">Users</li>
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
                            <strong>Form</strong>
                        </div>
                        <form class="form-horizontal" action="aksi/?aksi=users_save" id="form-add-upd">
                            <!-- begin:: id -->
                            <input type="hidden" id="id_users">
                            <!-- end:: id -->

                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="nama" class=" form-control-label">Nama&nbsp;*</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="nama" name="nama" class="form-control form-control-sm" placeholder="Masukkan Nama" />
                                        <small class="help-block form-text error"></small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="email" class=" form-control-label">Email&nbsp;*</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="email" name="email" class="form-control form-control-sm" placeholder="Masukkan Email" />
                                        <small class="help-block form-text error"></small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="level" class=" form-control-label">Level&nbsp;*</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="level" id="level" class="form-control form-control-sm">
                                            <option value="">- Pilih -</option>
                                            <option value="penilai">Penilai</option>
                                        </select>
                                        <small class="help-block form-text error"></small>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="add" id="add" class="btn btn-success btn-sm">
                                    <i class="fa fa-plus"></i> Tambah
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- end:: form -->
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
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Level</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody align="center">
                                    <?php
                                    $sql    = "SELECT u.id_users, u.nama, u.username, u.email, u.level, u.`status` FROM tb_users AS u";
                                    $query  = $pdo->Query($sql);
                                    $jumlah = $query->rowCount();
                                    $no = 1;
                                    if ($jumlah > 0) {
                                        while ($row = $query->fetch(PDO::FETCH_OBJ)) { ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $row->nama; ?></td>
                                                <td><?= $row->email; ?></td>
                                                <td><?= $row->username; ?></td>
                                                <td><?= ucfirst($row->level); ?></td>
                                                <td>
                                                    <button class="btn btn-warning btn-sm btn-action" type="button" id="res-pass" data-id="<?= $row->id_users ?>"><i class="fa fa-refresh"></i>&nbsp;Reset Password</button>
                                                    <?php if ($row->level !== 'admin') { ?>
                                                        &nbsp;<button class="btn btn-primary btn-sm btn-action" type="button" id="sts" data-sts="<?= $row->status ?>" data-id="<?= $row->id_users ?>"><?= ($row->status == '1') ? '<i class="fa fa-check"></i>&nbsp;Aktif' : '<i class="fa fa-times"></i>&nbsp;Tidak aktif' ?></button>
                                                        &nbsp;<button class="btn btn-danger btn-sm btn-action" type="button" id="del" data-id="<?= $row->id_users ?>"><i class="fa fa-trash"></i> Hapus</button>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
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