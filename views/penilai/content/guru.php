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