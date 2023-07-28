 <div class="breadcrumbs">
   <div class="col-sm-4">
     <div class="page-header float-left">
       <div class="page-title">
         <h1>Jabatan</h1>
       </div>
     </div>
   </div>
   <div class="col-sm-8">
     <div class="page-header float-right">
       <div class="page-title">
         <ol class="breadcrumb text-right">
           <li><a href="dashboard">Dashboard</a></li>
           <li class="active">Jabatan</li>
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
           <form class="form-horizontal" action="aksi/?aksi=kriteria_kat_save" id="form-add-upd">
             <!-- begin:: id -->
             <input type="hidden" id="id_kriteria_kat">
             <!-- end:: id -->

             <div class="card-body card-block">
               <div class="row form-group">
                 <div class="col col-md-3">
                   <label for="nama" class=" form-control-label">Kategori&nbsp;*</label>
                 </div>
                 <div class="col-12 col-md-9">
                   <input type="text" id="nama" name="nama" class="form-control form-control-sm" placeholder="Masukkan Kategori" />
                   <small class="help-block form-text error"></small>
                 </div>
               </div>
               <div class="row form-group">
                 <div class="col col-md-3">
                   <label for="nilai_min" class=" form-control-label">Nilai Minimal&nbsp;*</label>
                 </div>
                 <div class="col-12 col-md-9">
                   <input type="text" id="nilai_min" name="nilai_min" class="form-control form-control-sm" placeholder="Masukkan Nilai Minimal" />
                   <small class="help-block form-text error"></small>
                 </div>
               </div>
               <div class="row form-group">
                 <div class="col col-md-3">
                   <label for="nilai_max" class=" form-control-label">Nilai Maximal&nbsp;*</label>
                 </div>
                 <div class="col-12 col-md-9">
                   <input type="text" id="nilai_max" name="nilai_max" class="form-control form-control-sm" placeholder="Masukkan Nilai Maximal" />
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
                   <th>Kategori</th>
                   <th>Nilai Minimal</th>
                   <th>Nilai Maximal</th>
                   <th>Aksi</th>
                 </tr>
               </thead>
               <tbody align="center">
                 <?php
                  $query  = $pdo->GetAll('tb_kriteria_kat', 'id_kriteria_kat');
                  $jumlah = $query->rowCount();
                  $no = 1;
                  if ($jumlah > 0) {
                    while ($row = $query->fetch(PDO::FETCH_OBJ)) { ?>
                     <tr>
                       <td><?= $no++; ?></td>
                       <td><?= $row->nama; ?></td>
                       <td><?= $row->nilai_min; ?></td>
                       <td><?= $row->nilai_max; ?></td>
                       <td>
                         <button class="btn btn-primary btn-sm btn-action" id="upd" data-id="<?= $row->id_kriteria_kat ?>"><i class="fa fa-edit"></i> Ubah</button>&nbsp;
                         <button class="btn btn-danger btn-sm btn-action" id="del" data-id="<?= $row->id_kriteria_kat ?>"><i class="fa fa-trash"></i> Hapus</button>
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