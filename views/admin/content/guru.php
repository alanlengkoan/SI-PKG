 <div class="breadcrumbs">
   <div class="col-sm-4">
     <div class="page-header float-left">
       <div class="page-title">
         <h1>Guru</h1>
       </div>
     </div>
   </div>
   <div class="col-sm-8">
     <div class="page-header float-right">
       <div class="page-title">
         <ol class="breadcrumb text-right">
           <li><a href="dashboard">Dashboard</a></li>
           <li class="active">Guru</li>
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
           <form class="form-horizontal" action="aksi/?aksi=guru_save" id="form-add-upd">
             <!-- begin:: id -->
             <input type="hidden" id="id_guru">
             <!-- end:: id -->

             <div class="card-body card-block">
               <div class="row form-group">
                 <div class="col col-md-3">
                   <label for="nip" class=" form-control-label">NIP&nbsp;*</label>
                 </div>
                 <div class="col-12 col-md-9">
                   <input type="text" id="nip" name="nip" class="form-control form-control-sm" maxlength="16" placeholder="Masukkan NIP" />
                   <small class="help-block form-text error"></small>
                 </div>
               </div>
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
                   <label for="tmp_lahir" class=" form-control-label">Tempat Lahir&nbsp;*</label>
                 </div>
                 <div class="col-12 col-md-9">
                   <input type="text" id="tmp_lahir" name="tmp_lahir" class="form-control form-control-sm" placeholder="Masukkan Tempat Lahir" />
                   <small class="help-block form-text error"></small>
                 </div>
               </div>
               <div class="row form-group">
                 <div class="col col-md-3">
                   <label for="tgl_lahir" class=" form-control-label">Tanggal Lahir&nbsp;*</label>
                 </div>
                 <div class="col-12 col-md-9">
                   <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control form-control-sm" />
                   <small class="help-block form-text error"></small>
                 </div>
               </div>
               <div class="row form-group">
                 <div class="col col-md-3">
                   <label for="kelamin" class=" form-control-label">Jenis Kelamin&nbsp;*</label>
                 </div>
                 <div class="col-12 col-md-9">
                   <select name="kelamin" id="kelamin" class="form-control form-control-sm">
                     <option value="">- Pilih -</option>
                     <option value="L">Laki - laki</option>
                     <option value="P">Perempuan</option>
                   </select>
                   <small class="help-block form-text error"></small>
                 </div>
               </div>
               <div class="row form-group">
                 <div class="col col-md-3">
                   <label for="id_jabatan" class=" form-control-label">Status&nbsp;*</label>
                 </div>
                 <div class="col-12 col-md-9">
                   <select name="id_jabatan" id="id_jabatan" class="form-control form-control-sm">
                     <option value="">- Pilih -</option>
                     <?php
                      $query = $pdo->GetAll('tb_jabatan', 'id_jabatan');
                      while ($row = $query->fetch(PDO::FETCH_OBJ)) { ?>
                       <option value="<?= $row->id_jabatan ?>"><?= $row->nama ?></option>
                     <?php } ?>
                   </select>
                   <small class="help-block form-text error"></small>
                 </div>
               </div>
               <div class="row form-group">
                 <div class="col col-md-3">
                   <label for="id_pangkat" class=" form-control-label">Pangkat&nbsp;*</label>
                 </div>
                 <div class="col-12 col-md-9">
                   <select name="id_pangkat" id="id_pangkat" class="form-control form-control-sm">
                     <option value="">- Pilih -</option>
                     <?php
                      $query = $pdo->GetAll('tb_pangkat', 'id_pangkat');
                      while ($row = $query->fetch(PDO::FETCH_OBJ)) { ?>
                       <option value="<?= $row->id_pangkat ?>"><?= $row->nama ?></option>
                     <?php } ?>
                   </select>
                   <small class="help-block form-text error"></small>
                 </div>
               </div>
               <div class="row form-group">
                 <div class="col col-md-3">
                   <label for="id_pendidikan" class=" form-control-label">Jurusan&nbsp;*</label>
                 </div>
                 <div class="col-12 col-md-9">
                   <select name="id_pendidikan" id="id_pendidikan" class="form-control form-control-sm">
                     <option value="">- Pilih -</option>
                     <?php
                      $query = $pdo->GetAll('tb_pendidikan', 'id_pendidikan');
                      while ($row = $query->fetch(PDO::FETCH_OBJ)) { ?>
                       <option value="<?= $row->id_pendidikan ?>"><?= $row->nama ?></option>
                     <?php } ?>
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
                   <th>NIP</th>
                   <th>Nama</th>
                   <th>Tempat Lahir</th>
                   <th>Tanggal Lahir</th>
                   <th>Jenis Kelamin</th>
                   <th>Jabatan</th>
                   <th>Pangkat</th>
                   <th>Pendidikan</th>
                   <th>Aksi</th>
                 </tr>
               </thead>
               <tbody align="center">
                 <?php
                  $sql    = "SELECT g.id_guru, g.nip, g.nama, g.tmp_lahir, g.tgl_lahir, g.kelamin, j.nama AS jabatan, p.nama AS pangkat, e.nama AS pendidikan FROM tb_guru AS g LEFT JOIN tb_jabatan AS j ON j.id_jabatan = g.id_jabatan LEFT JOIN tb_pangkat AS p ON p.id_pangkat = g.id_pangkat LEFT JOIN tb_pendidikan AS e ON e.id_pendidikan = g.id_pendidikan ORDER BY g.id_guru DESC";
                  $query  = $pdo->Query($sql);
                  $jumlah = $query->rowCount();
                  $no = 1;
                  if ($jumlah > 0) {
                    while ($row = $query->fetch(PDO::FETCH_OBJ)) { ?>
                     <tr>
                       <td><?= $no++; ?></td>
                       <td><?= $row->nip; ?></td>
                       <td><?= $row->nama; ?></td>
                       <td><?= $row->tmp_lahir; ?></td>
                       <td><?= $myfun->tanggal_indo($row->tgl_lahir); ?></td>
                       <td><?= ($row->kelamin === 'L' ? 'Laki - laki' : 'Perempuan'); ?></td>
                       <td><?= $row->jabatan; ?></td>
                       <td><?= $row->pangkat; ?></td>
                       <td><?= $row->pendidikan; ?></td>
                       <td>
                         <button class="btn btn-primary btn-sm btn-action" id="upd" data-id="<?= $row->id_guru ?>"><i class="fa fa-edit"></i> Ubah</button>&nbsp;
                         <button class="btn btn-danger btn-sm btn-action" id="del" data-id="<?= $row->id_guru ?>"><i class="fa fa-trash"></i> Hapus</button>
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